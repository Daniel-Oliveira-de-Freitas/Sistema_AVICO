<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    protected function failedAuthorization()
    {
        throw new AuthorizationException("Você não possui acesso!");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required',
            'funcao' => 'required',
            'active' => ''
        ];
    }

    public function messages()
    {
        return [
            'funcao' => 'O campo função é obrigatório'
        ];
    }
}
