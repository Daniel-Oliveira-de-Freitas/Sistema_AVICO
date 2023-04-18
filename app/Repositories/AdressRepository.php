<?php

namespace App\Repositories;

use App\Models\Adress;
use App\Repositories\Contracts\GenericRepositoryInterface;
use Illuminate\Http\Request;

class AdressRepository
{
    public function save(Request $request, $personId)
    {
        $adress = new Adress();
        $adress->rua =  $request->endereco;
        $adress->nmrEndereco =  $request->nmrEndereco;
        $adress->complemento =  $request->complemento;
        $adress->cep =  $request->cep;
        $adress->bairro = $request->bairro;
        $adress->cidade = $request->cidade;
        $adress->estado = $request->uf;
        $adress->person_id = $personId;
        $adress->save();
    }
}
