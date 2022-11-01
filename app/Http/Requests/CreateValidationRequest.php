<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
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
            'image' => 'required|mimes:jpg,png,jpeg|max:5040',
            'title' => 'required|unique:books',
            'isbn' => 'required|unique:books',
            'description' => 'required',
            'published_date' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'genre' => 'required'
        ];
    }
}
