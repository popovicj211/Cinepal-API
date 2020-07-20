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
            'userId' => 'required|numeric',
            'movieId' => 'required|numeric',
             'qty' => 'required|numeric',
            'total' => 'required|regex:/^[0-9]{0,5}(\.)[0-9]{1,2}$/',
             'datefrom' => 'required|date|date_format:Y-m-d H:i:s',
              'dateto' => 'required|date|after:datefrom|date_format:Y-m-d H:i:s',
               'number' => 'required|numeric|array'
        ];
    }

    public function messages()
    {
        return [
            'userId.required' => 'User is required',
            'movieId.required' => 'Movie is required',
            'qty.required' => 'Quantity is required',
            'total.required' => 'Total price is required',
            'total.regex' => 'Total price not valid',
            'datefrom.regex' => 'Date from is required',
             'dateto.regex' => 'Date to is required',
            'number.required' => 'Seat number is required',
             'number.numeric' => 'Seat number must be number'
        ];
    }

}
