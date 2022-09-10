<?php

namespace App\Busines;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\PhilanthropistRepository;
use App\Repository\PersonRepository;
use App\Repository\VolunteerRepository;

class PersonBusines extends Controller
{
    private PersonRepository $personRepository;

    public function inserir(Request $request, $fileNames, $filePaths)
    {
        $this->personRepository = new PersonRepository();
        // if ($this->verifyCPF($request->cpf)) {
            return $this->personRepository->save($request, $fileNames, $filePaths);
        // // } else {
        //     return false;
        // }
    }

    private function verifyCPF($cpf)
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
