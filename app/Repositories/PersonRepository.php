<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\UserRepository;
use App\Repositories\FileRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonRepository
{
    private UserRepository $userRepository;
    private FileRepository $fileRepository;
    private AdressRepository $adressRepository;
    private ReasonRepository $reasonRepository;
    private FamilyVictimRepository $familyVictimRepository;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->fileRepository = new FileRepository();
        $this->adressRepository = new AdressRepository();
        $this->reasonRepository = new ReasonRepository();
        $this->familyVictimRepository = new FamilyVictimRepository();
    }

    public function save(Request $request, $fileNames, $filePaths)
    {
        try {
            DB::beginTransaction();
            $userid = $this->userRepository->save($request);
            $person = new Person();
            $person->nome_completo =  $request->nome;
            $person->user_id = $userid;
            $person->data_nascimento =  $request->dataNascimento;
            $person->genero =  $request->genero;
            $person->raca_cor =  $request->racaCor;
            $person->cpf =  $request->cpf;
            $person->rg =  $request->rg;
            $person->telefone = $request->celular;
            $person->telefone_residencial = $request->telefoneResidencial;
            $person->profissao = $request->profissao;
            $person->tipo_pagamento = $request->pagamento;
            $person->declaracao_isencao = $request->has('declaracao_isencao') ? true : false;
            $person->save();
            $this->reasonRepository->save($request, $person->id);
            $this->adressRepository->save($request, $person->id);
            $this->fileRepository->save($person->id, $fileNames, $filePaths);
            if (in_array('Familiar de vítima da COVID-19', $request->condicoes)) {
                $this->familyVictimRepository->save($request, $person->id);
            }
            DB::commit();
            return $person->id;
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
            return false;
        }
    }
}
