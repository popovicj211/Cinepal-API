<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "name" => "required|regex:/^[A-Z][a-z]{3,24}(\s[A-Z][a-z]{3,24})+$/",
            "username" => "required|unique:users,username|regex:/^[\w\-\@\+\?\!\.]{3,19}$/",
            "email" => "required|email|unique:users,email",
            "password"=> "required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d]).{7,}$/",
        ];

    }

    public function messages()
    {
       return [
                  "name.regex" => "Name is not valid",
                  "username.regex" => "Username is not valid",
                  "email.unique" => "Email is exist",
                   "email.required" => "Email is not valid",
                  "password.regex" => "Password must have at least one uppercase letter, lowercase letter and digit, 7 characters long ",
             ];
     }

}
