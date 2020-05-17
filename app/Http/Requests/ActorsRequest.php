<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorsRequest extends FormRequest
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
            'actor' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
      return  [
              'actor.required' => 'Actor is required',
               'actor.max' => 'Name must max 250 characters.',
               'actor.min' => 'Name must min 3 characters.'
        ];
    }
}
