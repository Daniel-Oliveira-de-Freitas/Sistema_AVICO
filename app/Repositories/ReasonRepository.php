<?php

namespace App\Repositories;

use App\Models\Reason;

class ReasonRepository
{
    public function save($request, $personId): void
    {
        Reason::create([
            'person_id' => $personId,
            'condicao' => json_encode($request->condicoes),
            'grau_parentesco' =>  $request->parentesco,
            'outros' => $request->outros
        ]);
    }
}
