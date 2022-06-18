<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewBatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        if(!$user = $this->user()) return false;
        return $user->role === 'mentor';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'class_link' => 'nullable|string|url',
            'access_link' => 'nullable|string|url',
            'attendees' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'video' => "nullable|string|url",
            'images' => 'required|image|max:200000',
            'startdate' => 'required|date|after:now',
            'enddate' => 'required|date|after:startdate',
            'title' => 'required|string',
            'short_code' => 'nullable|string',
            'discount' => 'required|string',
            'excerpt' => 'required|string',
            'objectives' => 'required|string',
            'discount_price' => 'nullable|numeric',
            'fixed' => 'nullable|numeric',
            'percent' => 'nullable|numeric|max:100|min:0',
            'time_limit' => 'nullable|date|before:startdate',
            'signup_limit' => 'nullable|numeric',
            'certificates' => 'required',
            'tags' => 'nullable|string|json',
        ];
    }


}
