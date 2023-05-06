<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'message' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'Este campo é obrigatório!',
            'email.email' => 'É necessário informar um email válido!'
        ];
    }
}
