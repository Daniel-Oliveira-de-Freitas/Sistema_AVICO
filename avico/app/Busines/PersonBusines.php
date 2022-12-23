<?php

namespace App\Busines;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\PersonRepository;
use Exception;

class PersonBusines extends Controller
{
    private PersonRepository $personRepository;

    public function inserir(Request $request, $fileNames, $filePaths)
    {
        $this->personRepository = new PersonRepository();
        return $this->personRepository->save($request, $fileNames, $filePaths);
    }
}
