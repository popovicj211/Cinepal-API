<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlidesRequest extends FormRequest
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
             'slideImage' => 'required|file|mimes:jpg,jpeg,png|max:2000',
              'header' => 'required|min:3',
              'text' => 'min:5'
        ];
    }

    public function messages()
    {
        return [
            'slideImage.required'  => 'Image is not uploaded.',
            'slideImage.mimes'  => 'This image extension is not allowed .',
            'slideImage.max'  => 'Maximum size of image is 2 MB.',
             'header.required' => 'Header is required',
             'header.min' => 'Header must min 3 characters',
            'text.min' => 'Header must min 3 characters'
        ];
    }
}
