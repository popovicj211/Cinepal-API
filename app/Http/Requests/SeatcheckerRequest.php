<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeatcheckerRequest extends FormRequest
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
              'seat' => 'required|array',
               'free' => 'required|number'
        ];
    }

    public function messages()
    {
        return [
            'seat.required' => 'Seat number is required',
             'free.required' => 'Free number is required'
        ];
    }

}
