<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tipo' => 'required|string|max:10|min:9',
            'nome' => 'required|string|max:255|min:3',
            'dataNascimento' => 'required|date',
            'genero' => 'required',
            'cpf' => 'required|numeric|max:11',
            'rg' => 'required|numeric|min:9|max:11',
            'celular' =>'required|numeric|min:10|max:11',
            'telefone_residencial' =>'numeric|min:9|max:11',
            'email' => [
                'required', 'email', 'unique:registrations'
            ],
            'endereco' => 'required|string',
            'nmrEndereco' => 'required|numeric',
            'complemento' => 'string',
            'cep' => 'required|numeric|max:8',
            'bairro' => 'required|string',
            'cidade_uf'=> 'required|string|max:50',
            'profissao' => 'string',
            'condicoes' => 'required|array|min:1|max:2',
            'grauParentesco' => 'array|min:1',
            'outro' => 'string',
            // 'pagamento' => 'required',
            'cpf_rg' => "required|array|min:1|max:4|mimes:jpg,png,jpeg|max:20000",
            'comprovanteMedico' => "required|array|min:1|max:4|mimes:jpg,png,jpeg|max:20000",
            'certidaoObito' => "required|array|min:1|max:4|mimes:jpg,png,jpeg|max:20000",
            'comprovanteEndereco' => "required|array|min:1|max:4|mimes:jpg,png,jpeg|max:20000",
            'comprovanteRenda' => "required|array|min:1|max:4|mimes:jpg,png,jpeg|max:20000",
        ];
    }
}
