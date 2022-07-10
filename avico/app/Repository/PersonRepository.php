<?php
namespace App\Repository;

use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\Person;
use App\Repository\UserRepository;
class PersonRepository{

    private UserRepository $userRepository;
    
    public function save(StoreRegistrationFormRequest $request){

        $user_id = $this->userRepository->save($request);

        $person = new Person();
        $person->nome =  $request->nome;
        $person->dataNascimento =  $request->dataNascimento;
        $person->genero =  $request->genero;
        $person->cpf =  $request->cpf;
        $person->rg =  $request->rg;
        $person->celular = $request->celular;
        $person->telefoneResidencial = $request->telefone_residencial;
        $person->profissao = $request->profissao;
        $person->userId = $user_id;
        $person->save();

        return $person->id;
    }
}