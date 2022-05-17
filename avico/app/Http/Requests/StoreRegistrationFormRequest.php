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
            'nome' => 'required|string|max:255|min:3',
            'cidade' => 'required',
            'estado' => 'required',
            'email' => [
                'required', 'email', 'unique:registrations'
            ],
            'telefone' => 'required|numeric',
            'profissao' => 'required',
            'infectado' => 'required',
            'perda' => 'required',
            'motivo' => 'required',
            'voluntario' => 'required',
            'contribuicao'=>'nullable',
            'indicacoes'=>'nullable'
        ];
    }
}
