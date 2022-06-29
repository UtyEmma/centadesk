<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MentorSignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "username" => "required|string|between:4,10|unique:users,username",
            'username' => ['required', 'string', 'unique:users,username'],
            'bank' => ['required', 'numeric'],
            'account_no' => ['required', 'numeric'],
            'account_name' => ['required', 'string'],
            'desc' => ['required', 'string'],
            'instagram' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'linkedin' => ['nullable', 'string'],
            'specialty' => ['required','string'],
            'website' => 'nullable|string|url',
            'resume' => "nullable|string|url",
            'kyc_method' => ['required', 'string'],
            'id_image' => ['required', 'image'],
            'id_number' => ['required', 'numeric'],
            'avatar' => ['nullable', 'image'],
            'experience' => ['required'],
            'qualification' => ['required'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
        ];
    }
}
