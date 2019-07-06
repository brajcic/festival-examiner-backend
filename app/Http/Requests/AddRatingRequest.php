<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRatingRequest extends FormRequest
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
            'name' => 'required|string',
            'rating' => 'required',
            'festival_id' => 'required'
            
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'rating.required' => 'Rating is required!',
            'festival_id.required' => 'Festival_id is required!'
        ];
    }
    
    
}
