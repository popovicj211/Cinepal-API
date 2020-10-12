<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
           // 'userId' => 'required|numeric',
            'movieId' => 'required|numeric',
             'qty' => 'required|numeric',
            'priceOfTehno' => 'required',
          //    'dateto' => 'required|date|date_format:Y-m-d H:i:s',
               'number' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
          //  'userId.required' => 'User is required',
            'movieId.required' => 'Movie is required',
            'qty.required' => 'Quantity is required',
            'priceOfTehno.required' => 'Total price is required',
         //    'dateto.regex' => 'Date to is required',
            'number.required' => 'Seat number is required'
        ];
    }

}
