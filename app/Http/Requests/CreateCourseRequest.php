<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateCourseRequest extends FormRequest
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
            'name' => ['required','string', 'unique:courses,name'],
            'desc' => 'required|string',
            'tags' => 'nullable|string|json',
            'video' => "nullable|string|url",
            'images' => 'required|image',
            'excerpt' => 'required|string|max:120',
            'category' => 'required|string',
            'objectives' => 'json'
        ];
    }
}
