<?php

namespace App\Repository;

use App\Models\Adress;
use Illuminate\Http\Request;

class AdressRepository
{
        
    private PersonRepository $personRepository;
    
    public function save(Request $request, $person_id){
        $this->personRepository = new PersonRepository();
        $adress = new Adress();
        $adress->rua =  $request->endereco;
        $adress->nmrEndereco =  $request->nmrEndereco;
        $adress->complemento =  $request->complemento;
        $adress->cep =  $request->cep;
        $adress->bairro = $request->bairro;
        $adress->cidade = $request->cidade;
        $adress->estado = $request->uf;
        $adress->person_id = $person_id;
        $adress->save();
    }
}