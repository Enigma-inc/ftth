<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
        //     'name' => 'required|max:150',
        //     'surname' => 'required|max:150',
        //     'phoneMobile' => 'required|max:20',
        //    // 'location' => 'required|integer|exists:locations,id|unique:surveys,location_id,NULL,id,email,'.$this->input('email'),
        //     'email' => 'required|email|max:255'

        ];
    }
    public function messages()
    {
        return [
            'location.unique' => 'Sorry, looks like you have already placed a request for this location',
            //'location.exists' => 'Select valid location',
            'email.email' => 'Your email is invalid',
            'phone-mobile.required' => 'The mobile number field is required.',
           // 'location.required' => 'Please select location',
           // 'location.integer' => 'Selected location is invalid',
        ];
    }
}
