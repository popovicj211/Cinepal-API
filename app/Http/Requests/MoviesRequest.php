<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

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
             'addMovieName' => 'required|max:250',
             'addMovieDesc' => 'required|max:2000',
              'addMovieReldate' => 'required',
            'addMovieReltime' => 'required',
             'addMovieRuntime' => 'required|numeric',
          //   'addMovieImage' => 'nullable|image|mimes:jpg,jpeg,png|max:2000',
           'addMovieImage' => 'required|base64image|base64mimes:jpg,jpeg,png|base64max:2000',
              'addMovieYear' => 'required|numeric',
              'checkArrayGenre' => 'required|array',
               'checkArrayTehno' => 'required|array',
               'checkArrayActor' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'addMovieName.required'  => 'Name is required.',
            'addMovieDesc.required'  => 'Date is required.',
           'addMovieReldate.required'  => 'Relase datetime is required.',
            'addMovieReltime.required'  => 'Relase time is required.',
            'addMovieRuntime.required'  => 'Runtime is required.',
            'addMovieYear.required'  => 'Year is required.',
           'checkArrayGenre.required'  => 'Genre is required.',
            'checkArrayTehno.required'  => 'Tehnology is required.',
             'checkArrayActor.required' => 'Actors are required',
           'addMovieImage.required'  => 'Image is not uploaded.',
          /* 'addMovieImage.mimes'  => 'This image extension is not allowed .',
          'addMovieImage.max'  => 'Maximum size of image is 2 MB.',*/
            'addMovieImage.base64image'  => 'This file  is not image.',
            'addMovieImage.base64mimes'  => 'This image extension is not allowed .',
            'addMovieImage.base64max'  => 'Maximum size of image is 2 MB.',
            'addMovieName.max'  => 'Name must max 250 characters.',
            'addMovieDesc.max'  => 'Description must max 250 characters.',
        ];
    }

}
