<?php

namespace App\Http\Requests\Notice;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
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
            'title' => 'required|max:255|min:3',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo de titulo é obrigatório',
            'body.required' => 'O campo de conteúdo é obrigatório',
            'title.max' => 'Numero de caracters máximo de 255 foi atingido'
        ];
    }
}
