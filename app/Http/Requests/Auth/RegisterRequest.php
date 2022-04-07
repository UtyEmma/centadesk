<?php

namespace App\Http\Requests\Auth;

use App\Library\Token;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ];
    }


    public function register(){
        $unique_id = Token::unique('users');
        $affiliate_id = Token::text(6);
        $referrer_id = User::where('referral_id', $this->ref)->first() ? $this->ref : null;

        $referral_id = Token::text('5', 'users', 'referral_id');

        $user = User::create([
            'unique_id' => $unique_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'affiliate_id' => $affiliate_id,
            'referrer_id' => $referrer_id,
            'referral_id' => $referral_id
        ]);

        return $user;
    }
}
