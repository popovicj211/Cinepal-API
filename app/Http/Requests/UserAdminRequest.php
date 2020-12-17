<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAdminRequest extends FormRequest
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
            "name" => "required|regex:/^[A-ZŠĐČĆŽ][a-zšđčćž]{3,24}(\s[A-ZŠĐČĆŽ][a-zšđčćž]{3,24})+$/",
            "username" => "required|unique:users,username|regex:/^[\w\-\@\+\?\!\.]{3,19}$/",
            "email" => "required|email|unique:users,email",
            "password"=> "nullable|regex:/^(?=.*[a-zšđčćž])(?=.*[A-ZŠĐČĆŽ])(?=.*[\d]).{7,}$/",
            "role" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.regex" => "Name is not valid",
            "name.required" => "Name is required",
            "username.regex" => "Username is not valid",
            "username.required" => "Username is required",
            "email.unique" => "Email is exist",
            "email.required" => "Email is not valid",
            "password.regex" => "Password must have at least one uppercase letter, lowercase letter and digit, 7 characters long ",
            "password.required" => "Password is required",
            "role.required" => "Role is required"
        ];
    }

}
