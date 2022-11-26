<?php

namespace App\Http\Livewire;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
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

    public Collection $dadosAdicionais;

    public function mount()
    {
        $this->fill([
            'dadosAdicionais' => collect([['nome' => '', 'parentesco' => '', 'idade' => '']]),
        ]);
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.associe-component');
    }

    protected $rules = [
        'email' => 'unique:users',
        'cpf' => 'unique:persons',
        'password' => 'min:8|required_with:confirmPassword|same:confirmPassword'
    ];

    protected $messages = [
        'required'  => 'Este campo é obrigatório.',
        'unique'    => ':attribute já está sendo usado.',
        'same' => 'A senha deve ser identica ao confirmar senha.',
        'min' => ':attribute deve ter pelo menos :min caracteres.',
        'numeric' => 'Digite apenas números.',
        'email' => 'Você deve digitar um :attribute valido.',
        'dadosAdicionais.*.nome.required' => 'Este campo é obrigatório.',
        'dadosAdicionais.*.parentesco.required' => 'Este campo é obrigatório.',
        'dadosAdicionais.*.idade.required' => 'Este campo é obrigatório.',
    ];


    public function updated($property)
    {
        $this->validateOnly($property);
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
                'dadosAdicionais.*.nome' => 'required',
                'dadosAdicionais.*.parentesco' => 'required',
                'dadosAdicionais.*.idade' => 'required|numeric'
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

    public function updatedCep($value)
    {
        if (strlen($value) === 8) {
            $dados = $this->searchCEP($value);
            $this->endereco = isset($dados['logradouro']) ? $dados['logradouro'] : "";
            $this->cidade = isset($dados['localidade']) ? $dados['localidade'] : "";
            $this->uf = isset($dados['uf']) ? $dados['uf'] : "";
            $this->complemento = isset($dados['complemento']) ? $dados['complemento'] : "";
            $this->bairro = isset($dados['bairro']) ? $dados['bairro'] : "";
            if (!isset($dados["erro"])) {
                return throw ValidationException::withMessages([
                    'cep' => 'CEP inválido'
                ]);
            }
        }
    }


    public function searchCEP($value)
    {
        $response =  Http::get('https://viacep.com.br/ws/' . $value . '/json/');
        if ($response->status() === 200) {
            return $response->json();
        }
    }

    public function updatedCelular($value)
    {
        if (!$this->formatPhoneNumber($value)) {
            return throw ValidationException::withMessages([
                'celular' => 'Erro!'
            ]);
        }
    }

    public function updatedTelefoneResidencial($value)
    {
        if (!$this->formatPhoneNumber($value)) {
            return throw ValidationException::withMessages([
                'telefone_residencial' => 'Erro!'
            ]);
        }
    }

    public function formatPhoneNumber($telefone)
    {
        $telefone = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));

        $regexTelefone = "^[0-9]{11}$";

        $regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/'; // Regex para validar somente celular
        if (preg_match($regexCel, $telefone) && (strlen($telefone) < 15)) {
            return true;
        } else {
            return false;
        }
    }

    public function generate_array()
    {
        $myArr = [
            'tipo' => $this->tipo,
            'nome' => $this->nome,
            'dataNascimento' => $this->dataNascimento,
            'genero' => $this->genero,
            'raca_cor' => $this->raca_cor,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'celular' => $this->celular,
            'telefone_residencial' => $this->telefone_residencial,
            'email' => $this->email,
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'nmrEndereco' => $this->nmrEndereco,
            'cidade' => $this->cidade,
            'uf' => $this->uf,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'profissao' => $this->profissao,
            'condicoes' => $this->condicoes,
            'outros' => $this->outros,
            'pagamento' => $this->pagamento,
            'declaracao_isencao' => $this->declaracao_isencao,
            'camposAdicionais' => $this->camposAdicionais
        ];
        return $this->generate_pdf($myArr);
    }

    public function addInput()
    {
        if (count($this->dadosAdicionais) !== 10) {
            $this->dadosAdicionais->push(['nome' => '', 'parentesco' => '', 'idade' => '']);
        }
    }

    public function removeInput($key)
    {
        $this->dadosAdicionais->pull($key);
    }

    public function generate_pdf($arr)
    {

        $pdf = Pdf::loadView('layouts.pdf', $arr)->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            'termo.pdf'
        );
    }
}
