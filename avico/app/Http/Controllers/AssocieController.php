<?php

namespace App\Http\Controllers;

use App\Business\PersonBusiness;
use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\File;
use App\Models\Registration as Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AssocieController extends Controller
{

    private PersonBusiness $business;
    public function create()
    {
        return view('static_views.associados.associe');
    }

    public function store(StoreRegistrationFormRequest $request, $fileNames, $filePaths)
    {
        $filesNameArray = [];
        $filesPathArray = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = $file->getClientOriginalName() . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $filepaths = 'files/' . $name;
                $filesNameArray[] = $name;
                $filesPathArray[] = $filepaths;
            }
        }
        $cadastro =  $this->business->inserir($request, $fileNames, $filePaths);
        if ($cadastro) {
            return redirect()->route('inscricao.avico')->with('sucess001', "Cadastro realizado com sucesso!");
        } else {
            return redirect()->route('inscricao.avico')->with('sucess001', "Erro ao realizar o cadastro!");
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
}
