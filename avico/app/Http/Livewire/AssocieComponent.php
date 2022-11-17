<?php

namespace App\Http\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Js;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AssocieComponent extends Component
{
    public $tipo = [];
    public $termos;
    public $nome;
    public $dataNascimento;
    public $password;
    public $confirmPassword;
    public $genero;
    public $raca_cor;
    public $cpf;
    public $rg;
    public $celular;
    public $telefone_residencial;
    public $email;
    public $cep;
    public $endereco;
    public $nmrEndereco;
    public $cidade;
    public $uf;
    public $complemento;
    public $bairro;
    public $profissao;
    public $condicoes = [];
    public $parentesco;
    public $outros;
    public $pagamento;
    public $declaracao_isencao;
    public $currentStep = 1;
    public $totalSteps = 5;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function render()
    {
        $this->dispatchBrowserEvent('jquery');
        $this->dispatchBrowserEvent('jquery2');
        return view('livewire.associe-component');
    }

    protected $rules = [
        'email' => 'unique:users',
        'cpf' => 'unique:persons',
        'password' => 'required_with:confirmPassword|same:confirmPassword',
    ];

    protected $messages = [
        'required'  => 'Este campo é obrigatório.',
        'unique'    => ':attribute já está sendo usado.',
        'same' => 'A senha deve ser identica ao confirmar senha.',
        'min' => ':attribute deve ter pelo menos :min caracteres.',
        'numeric' => 'Digite apenas números.',
        'email' => 'Você deve digitar um :attribute valido.'
    ];


    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function generate_pdf()
    {
        dd($this->pagamento);
        $pdf = Pdf::loadView('layouts.pdf', array($this->pagamento));
        return $pdf->setPaper('a4')->stream('termo.pdf');
    }

    public function increaseStep()
    {
        $this->validateData();
        if (in_array('voluntario', $this->tipo) && in_array('associado', $this->tipo) && $this->currentStep == 3) {
            $this->currentStep++;
        } elseif (in_array('voluntario', $this->tipo) && $this->currentStep == 3) {
            $this->currentStep++;
            $this->currentStep++;
        } else {
            $this->currentStep++;
        }
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        if (in_array('voluntario', $this->tipo) && in_array('associado', $this->tipo) && $this->currentStep == 3) {
            $this->currentStep--;
        } elseif (in_array('voluntario', $this->tipo) &&  $this->currentStep == 5) {
            $this->currentStep--;
            $this->currentStep--;
        } else {
            $this->currentStep--;
        }
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'tipo' => 'required|array|min:1',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'termos' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'nome' => 'required',
                'dataNascimento' => 'required',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|min:8',
                'genero' => 'required',
                'raca_cor' => 'required',
                'cpf' =>  'required|string',
                'rg' => 'required|string|max:18|min:10',
                'celular' => 'required',
                'email' => 'required|email',
                'cep' => 'required|numeric',
                'endereco' => 'required|string',
                'cidade' => 'required',
                'nmrEndereco' => 'required',
                'bairro' => 'required|string',
                'profissao' => 'required',
                'condicoes' => 'required|array|min:1',
            ]);
            if (in_array("Familiar de vítima da COVID-19", $this->condicoes)) {
                $this->validate([
                    'parentesco' => 'required'
                ]);
                if ($this->parentesco === "outros") {
                    $this->validate([
                        'outros' => 'required'
                    ]);
                }
            }
        } elseif ($this->currentStep == 4) {
            $this->validate([
                'pagamento' => 'required',
            ]);
        }
    }

    public function updateCelular($value)
    {
        $this->emit('jquery2');
    }

    public function updatedCpf($value)
    {
        $this->cpf = $this->formatCpf($this->validaCPF($value));
    }

    public function formatCpf($value)
    {
        if ($value !== "") {
            $cpf = substr_replace($value, '.', 3, 0);
            $cpf = substr_replace($cpf, '.', 7, 0);
            $cpf = substr_replace($cpf, '-', 11, 0);
            return $cpf;
        }
    }

    public function validaCPF($cpf = "")
    {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return throw ValidationException::withMessages([
                'cpf' => 'teu cpf tá errado'
            ]);
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return $this->cpfMessageError();
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        elseif (
            $cpf == '00000000000'  ||
            $cpf == '11111111111'  ||
            $cpf == '22222222222'  ||
            $cpf == '33333333333'  ||
            $cpf == '44444444444'  ||
            $cpf == '55555555555'  ||
            $cpf == '66666666666'  ||
            $cpf == '77777777777'  ||
            $cpf == '88888888888'  ||
            $cpf == '99999999999'
        ) {
            return $this->cpfMessageError();
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return $this->cpfMessageError();
                }
            }

            return $cpf;
        }
    }

    public function cpfMessageError()
    {
        return throw ValidationException::withMessages([
            'cpf' => 'CPF inválido.'
        ]);
    }

    public function updateCep($value){
        $this->emit('jquery');
    }

    function celular($telefone){
        $telefone= trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));
    
        $regexTelefone = "^[0-9]{11}$";
    
        $regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/'; // Regex para validar somente celular
        if (preg_match($regexCel, $telefone)) {
            return true;
        }else{
            return false;
        }
    }
}