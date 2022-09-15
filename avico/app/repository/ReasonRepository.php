<?php
namespace App\Repository;

use App\Models\Reason;

class ReasonRepository{

    public function save($request, $person_id){
        $reason = new Reason();
        $reason->person_id = $person_id;
        $reason->condicao =  json_encode($request->condicoes);
        $reason->grau_parentesco = $request->parentesco;
        $reason->outros = $request->outro;
        $reason->save();
    }
    
}