<?php

namespace App\Repositories;

use App\Models\FamilyVictim;

class FamilyVictimRepository
{

    public function save($request, $personId)
    {
        foreach ($request->dadosAdicionais as $dados) {
            $familyVictim = new FamilyVictim();
            $familyVictim->person_id = $personId;
            $familyVictim->nome_completo =  $dados["nome"];
            $familyVictim->grau_parentesco = $dados["parentesco"];
            $familyVictim->idade = $dados["idade"];
            $familyVictim->outro = $dados["outro"];
            $familyVictim->save();
        }
    }
}
