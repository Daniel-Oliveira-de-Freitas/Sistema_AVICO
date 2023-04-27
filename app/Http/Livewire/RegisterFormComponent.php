<?php

namespace App\Http\Livewire;

use App\Actions\AssocieGetPropertiesAction;
use App\Http\Controllers\Register\RegisterFormController;
use App\Http\Livewire\Traits\RegisterFormComponentStepMessagesTrait;
use App\Http\Livewire\Traits\RegisterFormComponentStepRulesTrait;
use App\Services\ViaCepService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterFormComponent extends Component
{
    use WithFileUploads, RegisterFormComponentStepMessagesTrait, RegisterFormComponentStepRulesTrait;

    public array $data = [];
    public $termoInscricao;
    public $fileCpfRg = [];
    public $fileComprovante;
    public $fileCertidaoObito = [];
    public $fileComprovanteEndereco;
    public $fileComprovanteIsencao;
    public $currentStep = 1;
    public $totalSteps = 5;

    public function render()
    {
        return view('livewire.register-form-component');
    }

    public function mount()
    {
        $this->data = AssocieGetPropertiesAction::initializeEmptyArray();
    }

    public function increaseStep()
    {
        $this->validateStep($this->currentStep);
        if (in_array('voluntario', $this->data['tipo']) &&
            in_array('associado', $this->data['tipo']) && $this->currentStep == 3) {
            $this->currentStep++;
        } elseif (in_array('voluntario', $this->data['tipo']) && $this->currentStep == 3) {
            $this->currentStep += 2;
        } else {
            $this->currentStep++;
        }
    }

    public function decreaseStep()
    {
        if (in_array('voluntario', $this->data['tipo']) &&
            in_array('associado', $this->data['tipo']) && $this->currentStep == 3) {
            $this->currentStep--;
        } elseif (in_array('voluntario', $this->data['tipo']) && $this->currentStep == 5) {
            $this->currentStep -= 2;
        } else {
            $this->currentStep--;
        }
    }

    public function validateStep(int $step)
    {
        $rules = $this->validationRules[$step];
        if (in_array("Familiar de vítima da COVID-19", $this->data['condicoes']) && $this->currentStep == 3) {
            $rules += [
                'data.dadosAdicionais.*.nome' => 'required',
                'data.dadosAdicionais.*.parentesco' => 'required',
                'data.dadosAdicionais.*.idade' => 'required|numeric'
            ];

            if ('data.dadosAdicionais.*.outro' === "outros") {
                $rules += [
                    'data.dadosAdicionais.*.outro' => 'required'
                ];
            }
        }

        if (in_array("Familiar de vítima da COVID-19", $this->data['condicoes']) && $this->currentStep == 5) {
            $rules += [
                'fileCertidaoObito' => 'required|max:10024'
            ];
        }

        if (in_array("Sobrevivente da COVID-19", $this->data['condicoes']) && $this->currentStep == 5) {
            $rules += [
                'fileComprovante' => 'required|max:10024'
            ];
        }

        if ($this->data['declaracaoIsencao'] && $this->currentStep == 5) {
            $rules += [
                'fileComprovanteIsencao' => 'required|max:10024'
            ];
        }

        $this->validate($rules);
    }

    public function formatCpf(string $value): array|string
    {
        if ($value !== "") {
            $cpf = substr_replace($value, '.', 3, 0);
            $cpf = substr_replace($cpf, '.', 7, 0);
            return substr_replace($cpf, '-', 11, 0);
        }
        return "";
    }

    public function validateCPF(string $cpf = ""): array|string
    {
        $cpfInvalidos = [
            '00000000000', '11111111111', '22222222222',
            '33333333333', '44444444444', '55555555555',
            '66666666666', '77777777777', '88888888888',
            '99999999999'
        ];
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11 || in_array($cpf, $cpfInvalidos)) {
            return $this->cpfMessageError();
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
        }
        return $this->formatCpf($cpf);
    }

    public function cpfMessageError()
    {
        return throw ValidationException::withMessages([
            'data.cpf' => 'O CPF informado é inválido'
        ]);
    }

    public function updated($key, $value)
    {
        if ($key == 'data.cep') {
            $viaCepArray = ViaCepService::handle($value);
            $this->data['endereco'] = $viaCepArray['endereco'];
            $this->data['cidade'] = $viaCepArray['cidade'];
            $this->data['uf'] = $viaCepArray['uf'];
            $this->data['complemento'] = $viaCepArray['complemento'];
            $this->data['bairro'] = $viaCepArray['bairro'];
        }
        if ($key === 'data.celular' && !$this->formatPhoneNumber($value)) {
            return throw ValidationException::withMessages([
                'data.celular' => 'O celular informado é inválido'
            ]);
        }

        if ($key === 'data.telefoneResidencial' && !$this->formatPhoneNumber($value)) {
            return throw ValidationException::withMessages([
                'data.telefoneResidencial' => 'O telefone residencial informado é inválido'
            ]);
        }

        if ($key === 'data.cpf') {
            $this->data['cpf'] = $this->validateCPF($value);
        }

        $this->validateOnly($key, $this->validationRules[$this->currentStep]);
    }

    public function formatPhoneNumber(string $telefone): bool
    {
        $telefone = preg_replace('/\D/', '', $telefone);

        $regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/';
        if (preg_match($regexCel, $telefone) && (strlen($telefone) < 15)) {
            return true;
        }

        return false;
    }

    public function addInput()
    {
        if (count($this->data['dadosAdicionais']) !== 10) {
            array_push($this->data['dadosAdicionais'], ['nome' => '', 'parentesco' => '', 'idade' => '', 'outro' => '']);
        }
    }

    public function removeInput(int $key)
    {
        unset($this->data['dadosAdicionais'][$key]);
    }

    public function generate_pdf()
    {
        $pdf = Pdf::loadView('layouts.pdf', $this->data)->setPaper('a4', 'landscape')->output();
        return response()->streamDownload(
            fn() => print($pdf),
            'termo.pdf'
        );
    }

    public function sendInfos()
    {
        $this->validateStep($this->currentStep);
        $associeController = new RegisterFormController();
        $myRequest = Request();
        $myRequest->setMethod('POST');
        $myRequest->request->add($this->data);
        $myRequest->files->set('registerFiles', $this->generateFilesArray());
        return $associeController->store($myRequest);
    }

    private function generateFilesArray(): array
    {
        return [
            $this->termoInscricao,
            $this->fileCpfRg,
            $this->fileComprovante,
            $this->fileCertidaoObito,
            $this->fileComprovanteEndereco,
            $this->fileComprovanteIsencao
        ];
    }
}
