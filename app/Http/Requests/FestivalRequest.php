<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FestivalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Auth::check();
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
            'festival_name' => 'required',
            'location' => 'required|string|max:50',
            'band_names' => 'nullable',
            'latitude' => 'required',
            'longitude' => 'required'
            
        ];
    }
    
    public function messages()
    {
        return [
            'festival_name.required' => 'Festival name is required!',
            'location.required' => 'Location is required!',
            'latitude.required' => 'Latitude is required!',
            'longitude.required' => 'Longitude is required'
        ];
    }
}

