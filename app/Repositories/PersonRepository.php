<?php

namespace App\Repositories;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonRepository
{

    public function save(Request $request, $userId)
    {
        return Person::create([
            'user_id' => $userId,
            'nome_completo' => $request->nome,
            'data_nascimento' => $request->dataNascimento,
            'genero' => $request->genero,
            'raca_cor' => $request->racaCor,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'telefone' => $request->celular,
            'telefone_residencial' => $request->telefoneResidencial,
            'profissao' => $request->profissao,
            'tipo_pagamento' => $request->pagamento,
            'declaracao_isencao' => $request->declaracaoIsencao
        ]);

    }
}
