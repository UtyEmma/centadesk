<?php

namespace App\Library;

use Cloudinary\Cloudinary;
use Exception;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class FileHandler {

    static function upload($files){
        try {
            if(!$files) return false;

            if(is_array($files)){

                for($i=0; $i < count($files); $i++) {
                    $file = $files[$i];
                    if(env('STORAGE') === 'local' ){
                        self::saveToStorage($file);
                    }else if (env('STORAGE') === 'cloud') {
                        $url = cloudinary()->upload($file->getRealPath())->getSecurePath();
                        $file_array[$i] = $url;
                    }
                }

                return json_encode($file_array);
            }

            if(env('STORAGE') === 'local'){
                $url = self::saveToStorage($files);
            }else if(env('STORAGE') === 'cloud'){
                $url = cloudinary()->upload($files->getRealPath())->getSecurePath();
            }

            return $url;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    static function saveToStorage($file){
        $ext = $file->getClientOriginalExtension();
        $imageName = Str::random().'.'.$ext;
        $file->move(public_path('/images/storage'), $imageName);
        return asset('/images/storage/'.$imageName);
    }

    static function updateFile($file, $oldFile){
        self::deleteFile($oldFile);
        return self::upload($file);
    }

    static function deleteFiles(array $files){
        foreach ($files as $file) {
            self::deleteFile($file);
        }
    }

    static function deleteFile($file){
        if ($file) {
            $cloudinary_id = self::extractFileId($file);
            cloudinary()->destroy($cloudinary_id);
        }
    }

    private static function extractFileId($file){
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        return basename($file, $ext);
    }


}
