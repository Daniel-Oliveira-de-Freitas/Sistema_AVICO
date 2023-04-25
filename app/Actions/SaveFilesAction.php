<?php

namespace App\Actions;

class SaveFilesAction
{
    public static function registerFormFilesSave($files, $folderName): array
    {
        $count = 0;
        $filePaths = array();
        foreach (collect($files)['registerFiles'] as $file) {
            $count++;
            if (!is_array($file) && $file !== null) {
                array_push($filePaths, $file->storeAs('files/' . $folderName, $count . $file->getClientOriginalName(), 'public'));
            } elseif (is_array($file)) {
                foreach ($file as $f) {
                    array_push($filePaths, $f->storeAs('files/' . $folderName, $count . $f->getClientOriginalName(), 'public'));
                }
            }
        }
        return $filePaths;
    }

    public static function noticeFileSave($file): string
    {
        if (!empty($file)) {
            $name = $file->getClientOriginalName();
            $file->move(public_path('images\assets\noticias\\'), $name);
            return 'images\assets\noticias\\' . $name;
        }
        return '';
    }
}
