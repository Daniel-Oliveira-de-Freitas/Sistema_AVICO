<?php
namespace App\Repository;

use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\Philanthropist;
use App\Models\Volunteer;
use App\Repository\PersonRepository;

class VolunteerRepository{

    private PersonRepository $repository;
    private FileRepository $fileRepository;

    public function save(StoreRegistrationFormRequest $request,$fileNames, $filePaths){

        $person_id = $this->repository->save($request);
        $this->fileRepository->save($request, $fileNames, $filePaths);

        $volunteer = new Volunteer();
        $volunteer->reason_id =  $request->reason;
        $volunteer->person_id =  $person_id;

        $volunteer->save();
    }
}