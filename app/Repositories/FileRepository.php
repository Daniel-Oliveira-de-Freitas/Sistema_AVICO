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
            'arquivos' => $filesInfos['arquivos'],
            'caminho_arquivos' => $filesInfos['caminho_arquivos'],
        ]);
    }
}
