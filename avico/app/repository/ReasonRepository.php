<?php
namespace App\Repository;

use App\Models\Reason;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReasonRepository{

    public function save($request, $person_id){
        $reason = new Reason();
        $reason->person_id = $person_id;
        $reason->condicao =  serialize($request->condicoes);
        $reason->grau_parentesco = $request->parentesco;
        $reason->outros = $request->outro;
        $reason->save();
    }
    
}