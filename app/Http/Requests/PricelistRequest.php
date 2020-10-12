<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricelistRequest extends FormRequest
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
            'movieId' => 'required|numeric',
             'catId' => 'required|numeric',
             'price' => 'required|regex:/^[0-9]{0,4}(\.)[0-9]{1,2}$/'
        ];
    }

    public function messages()
    {
        return [
            'movieId.required' => 'Movie is required',
            'catId.required' => 'Tehnology is required',
            'price.required' => 'Price is required',
            'price.regex' => 'Price not valid'
        ];
    }
}
