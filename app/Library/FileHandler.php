<?php

namespace App\Library;

use Cloudinary\Cloudinary;
use Exception;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileHandler {

    public function handleFiles($file, $update = false, $old_files = []){
        !is_array($file) ? $newFile = [$file] : $newFile = $file;
        $files = $this->upload($newFile);
        !is_array($files) ? $files = json_encode([$file]) : $files = json_encode($files);
        return $files;
    }

    public function upload($files){
        if(is_array($files)){
            for($i=0; $i < count($files); $i++) {
                $file = $files[$i];
                if(!file_exists($file)){ throw new Exception("No files Selected"); }
                $url = cloudinary()->upload($file->getRealPath())->getSecurePath();
                $file_array[$i] = $url;
            }
            return $file_array;
        }

        $url = cloudinary()->upload($files->getRealPath())->getSecurePath();
        return $url;
    }

    public function deleteFile($file){
        if ($file) {
            $cloudinary_id = $this->extractFileId($file);
            cloudinary()->destroy($cloudinary_id);
        }
    }

    private function extractFileId($file){
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        return basename($file, $ext);
    }


}
