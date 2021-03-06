<?php

namespace App\Http\Traits;

use App\Models\Batch;
use App\Models\Courses;
use App\Models\User;

trait MentorActions {

    function getMentorDetails($mentor){
        $mentor->courses = Courses::where('mentor_id', $mentor->unique_id)->get();
        return $mentor;
    }

    function getVerifiedMentors($limit = 0){
        $verifiedMentors = User::where([
            'role' => 'mentor',
            'is_verified' => 'verified'
        ])->limit($limit)->get();

        return $verifiedMentors;
    }

    function getApprovedMentors(){
        return User::where([
            'role' => 'mentor',
            'kyc_status' => 'approved'
        ])->get();
    }

}
