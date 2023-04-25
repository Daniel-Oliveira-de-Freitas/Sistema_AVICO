<?php

namespace App\Repositories;

use App\Models\Adress;
use Illuminate\Http\Request;

class AdressRepository
{
    public function save(Request $request, $personId): void
    {
        Adress::create([
            'person_id' => $personId,
            'rua' => $request->endereco,
            'nmrEndereco' => $request->nmrEndereco,
            'complemento' =>  $request->complemento,
            'cep' => $request->cep,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'estado' => $request->uf,
        ]);
    }
}
