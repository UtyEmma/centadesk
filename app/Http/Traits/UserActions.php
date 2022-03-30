<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Library\Token;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Date;

trait UserActions{

    function findOrFail($id, $column = 'unique_id'){
        if(!$user = User::where($column, $id)->first()){
            throw new Exception("The requested user does not exist");
        }

        $user->experience = json_decode($user->experience);
        $user->qualification = json_decode($user->qualification);
        return $user;
    }

    function findOrCreate($user){
        $token = Token::unique('users');

        $newUser = User::firstOrCreate([
            'email' => $user->email
        ], [
            'unique_id' => $token,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname
        ]);

        $newUser->save();

        return $newUser;
    }

}
