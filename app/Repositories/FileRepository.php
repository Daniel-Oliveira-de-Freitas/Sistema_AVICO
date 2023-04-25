<?php

namespace App\Repositories;

use App\Actions\SaveFilesAction;
use App\Models\File;

class FileRepository
{
    public function save($person, $files): void
    {
        $filesInfos = SaveFilesAction::registerFormFilesSave($files, $person->cpf);
        File::create([
            'person_id' => $person->id,
            'arquivos' => json_encode($filesInfos),
            'caminho_arquivos' =>  $filesInfos,
        ]);
    }
}
