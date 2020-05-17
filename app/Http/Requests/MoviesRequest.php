<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoviesRequest extends FormRequest
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
             'name' => 'required|max:250',
             'desc' => 'required|max:2000',
              'rel' => 'required|date|after:tomorrow|date_format:Y-m-d H:i:s',
             'runtime' => 'required|numeric',
              'image' => 'required|file|mimes:jpg,jpeg,png|max:2000',
              'year' => 'required|numeric',
              'category' => 'required|array',
               'actors' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Name is required.',
            'desc.required'  => 'Date is required.',
            'rel.required'  => 'Relase datetime is required.',
            'runtime.required'  => 'Runtime is required.',
            'year.required'  => 'Year is required.',
            'category.required'  => 'Category is required.',
             'actors.required' => 'Actors are required',
            'image.required'  => 'Image is not uploaded.',
            'image.mimes'  => 'This image extension is not allowed .',
            'image.max'  => 'Maximum size of image is 2 MB.',
            'name.max'  => 'Name must max 250 characters.',
            'desc.max'  => 'Description must max 250 characters.',
        ];
    }

}
