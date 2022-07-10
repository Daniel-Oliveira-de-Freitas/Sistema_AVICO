<?php

namespace App\Business;
use Illuminate\Http\Request;
use App\Repository\PhilanthropistRepository;
use App\Repository\PersonRepository;
use App\Repository\VolunteerRepository;

class PersonBusiness
{

    private PhilanthropistRepository $philanthropistRepository;
    private VolunteerRepository $volunteerRepository;

    public function inserir(Request $request, $fileNames, $filePaths){
        if($this->verifyCPF($request->cpf)){
            if($request->tipo == 0){
                return $this->volunteerRepository->save($request, $fileNames, $filePaths);
            }elseif($request->tipo == 1){
                return $this->philanthropistRepository->save($request, $fileNames, $filePaths);
            }
        }else{
            return false;
        }
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
