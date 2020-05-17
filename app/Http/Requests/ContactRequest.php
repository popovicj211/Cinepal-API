<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'contName' => 'required|min:3|max:250',
            'contEmail' => 'required|email|unique:contact,email',
            'contSubject' => 'required|min:3',
            'contMessage' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'contName.required' => 'Name is required',
            'contEmail.required' => 'Email is required',
            'contSubject.required' => 'Subject is required',
             'contMessage.required' => 'Message is required',
            'contEmail.unique' => 'Email exist',
             'contName.min' => 'Name must min 3 characters' ,
            'contSubject.min' => 'Subject must min 3 characters',
             'contMessage.min' => 'Subject must min 3 characters',
            'contName.max' => 'Name must max 250 characters'
        ];
    }

}
