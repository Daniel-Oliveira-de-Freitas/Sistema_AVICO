<?php

namespace App\Http\Requests\Notice;

use Illuminate\Foundation\Http\FormRequest;

class NoticeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /** @return array */
    public function rules()
    {
        return [
            'title'    => 'required|max:255|min:3',
            'body'     => 'required',
            'userfile' => 'nullable|file|image|mimes:jpeg,png|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo de titulo é obrigatório',
            'body.required'  => 'O campo de conteúdo é obrigatório',
            'title.max'      => 'Numero de caracters máximo de 255 foi atingido',
        ];
    }
}
