<?php

namespace App\Actions;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class SaveFilesAction
{
    public static function registerFormFilesSave($files, $folderName)
    {
        $absolutePath = 'files/' . $folderName;
        $count = 0;
        $filePaths = [];

        foreach (collect($files)['registerFiles'] as $file) {
            $count++;
            if (!is_array($file) && $file !== null) {
                $filePaths[] = $file->storeAs($absolutePath, $count . $file->getClientOriginalName(), 'public');
            } elseif (is_array($file)) {
                foreach ($file as $f) {
                    $filePaths[] = $f->storeAs($absolutePath, $count . $f->getClientOriginalName(), 'public');
                }
            }
        }

        return [
            'arquivos'         => $filePaths,
            'caminho_arquivos' => $absolutePath,
        ];
    }

    /**
     * Salva a imagem em public/images/assets/img/noticias e retorna caminho relativo (para asset()).
     * @param UploadedFile|null $file
     * @return string|null
     */
    public static function noticeFileSave($file)
    {
        if (!$file instanceof UploadedFile) {
            return null;
        }

        $folder = 'images/assets/img/noticias';
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $ext = $file->getClientOriginalExtension();
        $safeName = time() . '_' . Str::slug($originalName) . '.' . $ext;

        // garante o diretório
        $absFolder = public_path($folder);
        if (!is_dir($absFolder)) {
            @mkdir($absFolder, 0775, true);
        }

        $file->move($absFolder, $safeName);

        return $folder . '/' . $safeName;
    }
}
