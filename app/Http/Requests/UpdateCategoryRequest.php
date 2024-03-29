<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'id' => 'required|integer',
            'category_name' => 'required|string'
        ];
    }
    
    public function messages()
    {
        return [
            'category_name.required' => 'Category name is required!',
            'id.required' => 'ID is required!'
           
        ];
    }
    
}
