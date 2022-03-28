<?php

namespace App\Http\Traits;

use App\Library\DateTime;

trait StudentActions{

    static function parseStudentData($student){
            $student->created_at = DateTime::parseTimestamp($student->created_at);
            return $student;
    }
}
