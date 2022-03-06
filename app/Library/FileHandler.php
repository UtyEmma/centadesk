<?php

namespace App\Library;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileHandler {

    private static function validateFiles(){}

    private static function save($file){

    }

    static function uploadMultiple($files, $location){
        $items = array_map(function($file) use($location) {
            return Storage::put($location, $file);
        }, $files);

        return serialize($items);
    }

    static function upload($file, $location){
        $path = Storage::put($location, $file);
        return $path;
    }


}
