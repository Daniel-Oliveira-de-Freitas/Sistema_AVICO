<?php

namespace App\Repositories;

use App\Models\FamilyVictim;

class FamilyVictimRepository
{
    public function save($request, $personId): void
    {
        foreach ($request->dadosAdicionais as $dados) {
            FamilyVictim::create([
                'person_id' => $personId,
                'nome_completo' => $dados["nome"],
                'grau_parentesco' => $dados["parentesco"],
                'idade' => $dados["idade"],
                'outro' => $dados["outro"]
            ]);
        }
    }
}
