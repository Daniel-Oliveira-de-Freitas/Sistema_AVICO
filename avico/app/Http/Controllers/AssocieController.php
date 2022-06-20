<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\Registration as Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AssocieController extends Controller
{

    public function create()
    {
        return view('static_views.associados.associe');
    }

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
        $motivos = $request->input('motivo');
        $motivoArray = array();

        foreach ($motivos as $mot) {
            $motivoArray[] = $mot;
        }

        $inscrito->motivo = json_encode($motivoArray);
        $inscrito->voluntario = $request->voluntario;
        $inscrito->contribuicao = $request->contribuicao;
        $inscrito->indicacoes = $request->indicacoes;
        $inscrito->save();

        return redirect('/inscricao');
    }



    function verifyCPF($cpf)
    {
        $cpfToArray = str_split($cpf);
        $tenthDigit = $cpfToArray[9];
        $eleventhDigit = $cpfToArray[10];
        array_pop($cpfToArray);
        array_pop($cpfToArray);
        $total = 0;
        $multiplicador = 2;
        
        for ($index = 8; $index > 0; $index--) {
            $total += $cpfToArray[$index] * $multiplicador;
            $multiplicador++;
        }
        
        $resto = $total % 11;
        unset($total);
        
        if ($resto >= 2) {
            $tenthShouldBe = 11 - $resto;
            array_push($cpf, $tenthShouldBe);
        } else {
            $tenthShouldBe = 0;
            array_push($cpf, $tenthShouldBe);
        }
        
        $multiplicador = 2;
        for ($index = 9; $index > 0; $index--) {
            $total += $cpfToArray[$index] * $multiplicador;
            $multiplicador++;
        }

        if ($resto >= 2) {
            $eleventhShouldBe = 11 - $resto;
            array_push($cpf, $eleventhShouldBe);
        } else {
            $eleventhShouldBe = 0;
            array_push($cpf, $eleventhShouldBe);
        }

        if ($tenthDigit == $cpf[9] && $eleventhDigit == $cpf[10]) {
            return true;
        } else {
            return false;
        }
    }
}
