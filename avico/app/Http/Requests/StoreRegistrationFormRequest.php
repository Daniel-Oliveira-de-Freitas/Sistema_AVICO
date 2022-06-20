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
            'cpf' => 'numeric',
            'rg' => 'numeric',
            'celular' =>'required|numeric|min:8|max:8',
            'telefone_residencial' =>'numeric',
            'email' => [
                'required', 'email', 'unique:registrations'
            ],
            'endereco' => 'required'

        ];
    }
}
