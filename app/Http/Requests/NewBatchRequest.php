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
            'video' => 'nullable|url|regex:/(youtube.com|youtu.be)\/(watch)?(\?v=)?(\S+)?/',
            'images' => 'required|image',
            'startdate' => 'required|string|date',
            'enddate' => 'required|string|date',
            'title' => 'required|string',
            'short_code' => 'nullable|string',
            'discount' => 'required|string',
            'excerpt' => 'required|string',
            'objectives' => 'required|string',
            'discount_price' => 'nullable|numeric',
            'fixed' => 'nullable|numeric',
            'percent' => 'nullable|numeric|max:100|min:0',
            'time_limit' => 'nullable|string|date',
            'signup_limit' => 'nullable|numeric'
        ];
    }


}
