<?php

namespace App\Repository;
use App\Models\Person;
use App\Repository\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonRepository
{

    private UserRepository $userRepository;
    private FileRepository $fileRepository;
    private AdressRepository $adressRepository;
    private ReasonRepository $reasonRepository;

    public function save(Request $request, $fileNames, $filePaths)
    {
        $this->userRepository = new UserRepository();
        $this->fileRepository = new FileRepository();
        $this->adressRepository = new AdressRepository();
        $this->reasonRepository = new ReasonRepository();
        try {
            DB::beginTransaction();
            $userid = $this->userRepository->save($request);
            $person = new Person();
            $person->nome_completo =  $request->nome;
            $person->user_id = $userid;
            $person->data_nascimento =  $request->dataNascimento;
            $person->genero =  $request->genero;
            $person->cpf =  $request->cpf;
            $person->rg =  $request->rg;
            $person->telefone = $request->celular;
            $person->telefone_residencial = $request->telefone_residencial;
            $person->profissao = $request->profissao;
            $person->tipo_pagamento = $request->pagamento;
            $person->save();

            $this->reasonRepository->save($request, $person->id);
            $this->adressRepository->save($request, $person->id);
            $this->fileRepository->save($person->id, $fileNames, $filePaths);
            DB::commit();
            return $person->id;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}