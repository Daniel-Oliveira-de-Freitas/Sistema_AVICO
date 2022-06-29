<?php

namespace App\Http\Controllers;

use App\Models\Registration as Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AssocieController extends Controller
{

    public function create()
    {
        return view('static_views.associados.associe');
    }

    public function store(Request $request)
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
        $inscrito->grauParentesco = $request->parentesco;
        $inscrito->outro = $request->outro;
        $inscrito->pagamento = $request->pagamento;
        // $inscrito->cpf_rg = $request->cpf_rg;
        // $inscrito->comprovanteMedico = $request->comprovanteMedico;
        // $inscrito->certidaoObito = $request->certidaoObito;
        // $inscrito->comprovanteEndereco = $request->comprovanteEndereco;
        // $inscrito->comprovanteRenda = $request->comprovanteRenda;
        $inscrito->save();

        return redirect()->route('inscricao.avico')->with('sucess001', "Cadastro realizado com sucesso!");
    }

    function fileSave($req, $name){
        $files = $req->file("{{$name}}");
         foreach ($files as $cond) {
                $imageName = '-image-'.time().rand(1,1000).'.'.$cond->extension();
                $cond->move(public_path('product_images'),$imageName);
                return $cond;
            }
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
