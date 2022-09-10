<?php

namespace App\Repository;

use App\Models\File;

class FileRepository
{
    
    public function save($person_id, $filenames, $filepaths)
    {
        $file = new File();
        $file->arquivos = $this->transformValuesInJson($filenames);
        $file->caminho_arquivos =   $this->transformValuesInJson($filepaths);
        $file->person_id = $person_id;
        $file->save();
    }
   
    private function transformValuesInJson($value)
    {
        $condicaoArray = array();

        foreach ($value as $cond) {
            $condicaoArray[] = $cond;
        }
        return json_encode($condicaoArray);
    }
}