<?php

namespace App\Repositories;

use App\Models\Reason;

class ReasonRepository
{

    public function save($request, $personId)
    {
        $reason = new Reason();
        $reason->person_id = $personId;
        $reason->condicao =  json_encode($request->condicoes);
        $reason->grau_parentesco = $request->parentesco;
        $reason->outros = $request->outros;
        $reason->save();
    }
}
