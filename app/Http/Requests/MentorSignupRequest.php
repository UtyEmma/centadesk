<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorSignupRequest extends FormRequest
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
            'username' => ['required', 'string', 'unique:users,username'],
            'bank' => ['required', 'string'],
            'account_no' => ['required', 'numeric', 'max:10'],
            'account_name' => ['required', 'string'],
            'desc' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'specialty' => ['required','string'],
            'kyc_method' => ['required', 'string'],
            'id_image' => ['required', 'image'],
            'id_number' => ['required', 'numeric'],
            'payment_method' => ['required', 'string'],
            'crypto_wallet' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'qualification' => ['required', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
        ];
    }
}
