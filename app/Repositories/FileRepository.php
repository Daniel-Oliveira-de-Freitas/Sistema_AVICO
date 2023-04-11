<?php

namespace App\Repositories;

use App\Models\File;

class FileRepository
{

    public function save($person_id, $filenames, $filepaths)
    {
        $file = new File();
        $file->arquivos = json_encode($filenames);
        $file->caminho_arquivos =  $filepaths;
        $file->person_id = $person_id;
        $file->save();
    }
}
