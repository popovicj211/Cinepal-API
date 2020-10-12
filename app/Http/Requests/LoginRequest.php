<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
                'email' => 'required|email',
               'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d]).{7,}$/'
        ];
    }

    public function messages()
    {
        return [
                  'email.required' => 'Email is required' ,
                   'password.required' => 'Password is required',
                   'email.email' => 'Email is not valid',
                    'password.regex' => 'Password must have at least one uppercase letter, lowercase letter and digit,minimal 7 characters long'
        ];
    }


}
