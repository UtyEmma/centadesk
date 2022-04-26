<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Library\FileHandler;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Review;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\NewSignupNotification;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

trait UserActions{

    function newUser($request){
        $unique_id = Token::unique('users');
        $affiliate_id = Token::text(6, 'users', 'affiliate_id');
        $ref = request()->query('ref') ?? session('ref');
        $referrer_id = User::where('affiliate_id', $ref)->first() ? $ref : null;

        $user = User::create([
            'unique_id' => $unique_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => isset($request->password) ? Hash::make($request->password) : '',
            'affiliate_id' => strtolower($affiliate_id),
            'referrer_id' => $referrer_id
        ]);

        $wallet_id = Token::unique('wallets');

        Wallet::create([
            'unique_id' => $wallet_id,
            'user_id' => $user->unique_id
        ]);

        $notification = [
            'profile' => env('MAIN_APP_URL').RouteServiceProvider::LEARNING_CENTER
        ];
        try {
            Notification::send($user, new NewSignupNotification($notification));
        } catch (\Throwable $th) {
            return $user;
        }
        return $user;
    }

    function findOrFail($id, $column = 'unique_id'){
        if(!$user = User::where($column, $id)->first()){
            throw new Exception("The requested user does not exist");
        }

        $user->experience = json_decode($user->experience);
        $user->qualification = json_decode($user->qualification);
        return $user;
    }

    function findOrCreate($user){
        return User::where('email', $user->email)->first() ?? $this->newUser($user);
    }

    function updateUser($request, $user){
        if(!$user = User::find($user->unique_id)) return false;
        $avatar = $user->avatar;

        if($request->avatar){
            FileHandler::deleteFile($user->avatar);
            $avatar = FileHandler::upload($request->avatar);
        }

        $user->update(array_merge($request->all(), [
            'avatar' => $avatar
        ]));

        return $user;
    }

}
