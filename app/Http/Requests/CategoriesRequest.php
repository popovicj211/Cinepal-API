<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
             'catName' => 'required|min:3|max:255',
             'subCat' => 'nullable|numeric'
        ];
    }

    public function messages()
    {
        return  [
            'catName.required' => 'Actor is required',
            'catName.max' => 'Name must max 250 characters.',
            'catName.min' => 'Name must min 3 characters.',
            'subCat.numeric' => 'Subcategory is number'
        ];
    }
}
