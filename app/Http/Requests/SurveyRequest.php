<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
            'name' => 'required|max:150',
            'surname' => 'required|max:150',
            'phone-mobile' => 'required|max:20',
            'email' => 'required|email|max:255|unique:surveys'

        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'Look like you have already placed a request for this location',
            'email.email' => 'Your email is invalid',
            'phone-mobile.required' => 'The mobile number field is required.',
        ];
    }
}
