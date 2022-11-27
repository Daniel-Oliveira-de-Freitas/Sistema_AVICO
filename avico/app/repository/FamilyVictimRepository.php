<?php
namespace App\Repository;

use App\Models\FamilyVictim;

class FamilyVictimRepository{

    public function save($request, $person_id){
        foreach($request->dadosAdicionais as $dados){
            $familyVictim = new FamilyVictim();
            $familyVictim->person_id = $person_id;
            $familyVictim->nome_completo =  $dados["nome"];
            $familyVictim->grau_parentesco = $dados["parentesco"];
            $familyVictim->idade = $dados["idade"];
            $familyVictim->save();
        }
    }
}