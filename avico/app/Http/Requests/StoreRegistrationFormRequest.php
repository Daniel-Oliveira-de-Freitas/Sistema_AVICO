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
            'cpf' => 'required|numeric|unique:registrations|digits_between:10,11',
            'rg' => 'required|numeric|digits_between:9,11',
            'celular' =>'required|digits_between:10,18',
            'email' => [
                'required', 'email', 'unique:registrations'
            ],
            'endereco' => 'required|string',
            'nmrEndereco' => 'required|numeric',
            'cep' => 'required|numeric|digits_between:0,8',
            'bairro' => 'required|string',
            'cidade'=> 'required|string|max:50',
            'uf'=> 'required',
            'condicoes' => 'required|array|min:1|max:2',
            'grauParentesco' => 'array|min:1',
            // 'outro' => 'string|min:3',
            // 'pagamento' => 'required',
            'filenames' => "required|array|min:1|max:8|max:20000",
        ];
    }



}
