<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\Registration as Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AssocieController extends Controller
{
    public function store(StoreRegistrationFormRequest $request)
    {
        $inscrito = new Registration();
        $inscrito->nome =  $request->nome;
        $inscrito->cidade =  $request->cidade;
        $inscrito->estado =  $request->estado;
        $inscrito->email =  $request->email;
        $inscrito->telefone = $request->telefone;
        $inscrito->profissao = $request->profissao;
        $inscrito->infectado =  $request->infectado;
        $inscrito->descricao = $request->descricao;
        $inscrito->perda =  $request->perda;
        //$inscrito-> $request->vinculo; verificar se é necessario realizar a persistencia
        $motivos = $request->input('motivo');
        $motivoArray = array();

        foreach ($motivos as $mot) {
            $motivoArray[] = $mot;
        }

        $inscrito->motivo = json_encode($motivoArray);
        //$inscrito->motivo =  $request->motivo;
        $inscrito->voluntario = $request->voluntario;
        $inscrito->contribuicao = $request->contribuicao;
        $inscrito->indicacoes = $request->indicacoes;
        $inscrito->save();

        return redirect('/inscricao');
    }
}
