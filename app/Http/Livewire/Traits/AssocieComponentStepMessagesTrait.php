<?php

declare(strict_types=1);

namespace App\Http\Livewire\Traits;

trait AssocieComponentMessagesTrait
{
    protected array $messages = [
        'required' => 'Este campo é obrigatório.',
        'unique' => 'Esse valor já está sendo usado.',
        'same' => 'A senha deve ser identica ao confirmar senha.',
        'min' => 'O campo deve ter pelo menos :min caracteres.',
        'max' => 'O arquivo excedeu o tamanho de 1 mb',
        'numeric' => 'Digite apenas números.',
        'email' => 'Você deve digitar um email valido.',
        'data.dadosAdicionais.*.nome.required' => 'Este campo é obrigatório.',
        'data.dadosAdicionais.*.parentesco.required' => 'Este campo é obrigatório.',
        'data.dadosAdicionais.*.idade.required' => 'Este campo é obrigatório.',
    ];
}
