<?php

namespace App\Library;


class Response {

    static function redirectBack($type = null, $message = null){
        return redirect()->back()->with($type, $message);
    }

    static function redirect($to, $type = null, $message = null){
        return redirect($to)->with($type, $message);
    }

    static function view($blade, $data = []){
        return response()->view($blade, $data);
    }

}
