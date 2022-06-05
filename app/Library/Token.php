<?php
namespace App\Library;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Token {
    private static function generateId(){
        $uuid = (string) Str::uuid();
        $trim = explode('-', $uuid);
        $id = $trim[4];
        return $id;
    }

    static function unique($table, $column = 'unique_id'){
        $id =  static::generateId();
        $status = DB::table($table)->where($column, '===', $id)->first() ? false : $id;
        if (!$status) { return static::unique($table, $column); }
        return $status;
    }

    static function random(int $min = 10000, int $max = 999999){
        $random = rand($min, $max);
        return $random;
    }


    static function text(int $len = 5, $table = null, $column = null){
        $str = Str::random($len);
        if($table && $column){
            $status = DB::table($table)->where($column, '===', $str)->first() ?? false;
            $array = ['about', 'contact', 'onboarding', 'categories', 'learning', 'wallet', 'profile', 'reports', 'transaction', 'enroll', 'mentor', 'me', 'mentors', 'courses', 'terms', 'privacy-policy', 'faqs', 'disclaimer']; //Filter out some words from the routes to ensure that they do not conflict
            if ($status || in_array($str, $array)) return static::text($len, $table, $column);
        }

        return $str;
    }
}
