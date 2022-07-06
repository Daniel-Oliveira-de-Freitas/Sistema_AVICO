<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\File;
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
        $inscrito->tipo = $request->tipo;
        $inscrito->nome =  $request->nome;
        $inscrito->dataNascimento =  $request->dataNascimento;
        $inscrito->genero =  $request->genero;
        $inscrito->cpf =  $request->cpf;
        $inscrito->email =  $request->email;
        $inscrito->password =  $request->password;
        $inscrito->rg =  $request->rg;
        $inscrito->celular = $request->celular;
        $inscrito->telefone_residencial = $request->telefone_residencial;
        $inscrito->endereco =  $request->endereco;
        $inscrito->nmrEndereco = $request->nmrEndereco;
        $inscrito->complemento = $request->complemento;
        $inscrito->cep = $request->cep;
        $inscrito->bairro = $request->bairro;
        $inscrito->cidade_uf = $request->cidade_uf;
        $inscrito->profissao = $request->profissao;
        $condicaos = $request->input('condicoes');
        $inscrito->condicao = $this->transformValuesInJson($condicaos);
        $grau =  $request->parentesco;
        $inscrito->grauParentesco = $grau;
        $inscrito->outro = $request->outro;
        $inscrito->pagamento = $request->pagamento;
        $inscrito->save();
        $file = new File();
        $file->filenames =  $this->storageFile($request);
        $file->registration_id = $inscrito->id;
        $file->save();
        return redirect()->route('inscricao.avico')->with('sucess001', "Cadastro realizado com sucesso!");
    }

    public function storageFile($request)
    {
        $filesArray = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = $file->getClientOriginalName() . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $filesArray[] = $name;
            }
        }
        return $filesArray;
    }

    function transformValuesInJson($value)
    {
        $condicaoArray = array();

        foreach ($value as $cond) {
            $condicaoArray[] = $cond;
        }
        return json_encode($condicaoArray);
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
