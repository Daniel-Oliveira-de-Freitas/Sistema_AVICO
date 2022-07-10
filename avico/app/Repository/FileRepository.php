<?php

namespace App\Repository;

use App\Http\Requests\StoreRegistrationFormRequest;
use App\Models\File;

class FileRepository
{
    public function save(StoreRegistrationFormRequest $request, $filenames, $filepaths)
    {
        $user_id = $this->userRepository->save($request);
        $file = new File();
        $file->filenames =  $filenames;
        $file->file_path =  $filepaths;
        $file->user_id =   $user_id;
        $file->save();
    }
   

}
