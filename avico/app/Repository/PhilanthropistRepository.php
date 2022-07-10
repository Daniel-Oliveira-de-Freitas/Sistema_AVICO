<?php
namespace App\Repository;

use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\Philanthropist;
use App\Repository\PersonRepository;

class PhilanthropistRepository{

    private PersonRepository $repository;

    public function save(StoreRegistrationFormRequest $request){

        $person_id = $this->repository->save($request);

        $philanthropist = new Philanthropist();
        $philanthropist->tipoPagamento =  $request->tipoPagamento;
        $philanthropist->person_id =  $person_id;

        $philanthropist->save();

    }
}