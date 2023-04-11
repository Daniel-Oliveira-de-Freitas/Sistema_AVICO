<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ViaCepService
{
    public static function handle(string $zipcode): array
    {
        $response = Http::get("https://viacep.com.br/ws/${zipcode}/json/")->json();

        if (!isset($response['erro']) && $response) {
            return [
                'endereco' => $response['logradouro'],
                'cidade' => $response['localidade'],
                'uf' => $response['uf'],
                'complemento' => $response['complemento'],
                'bairro' => $response['bairro']
            ];
        }

        return throw ValidationException::withMessages([
            'data.cep' => 'CEP não encontrado'
        ]);
    }
}
