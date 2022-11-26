<?php
namespace App\Repository;

use App\Models\FamilyVictim;

class FamilyVictimRepository{

    public function save($request, $person_id){
        $familyVictim = new FamilyVictim();
        $familyVictim->person_id = $person_id;
        $familyVictim->nome_completo =  $request->nomeParente;
        $familyVictim->grau_parentesco = $request->parentesco;
        $familyVictim->idade = $request->idade;
        $familyVictim->save();
    }
}