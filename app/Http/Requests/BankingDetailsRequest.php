<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankingDetailsRequest extends FormRequest
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
                'bankName'=>'required',
                'branchName'=>'required',
                'branchCode' => 'required',
                'accountHolderName'=>'required',
                'accountType'=>'required',
                'accountNumber'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'bankName.required' => ' Bank name field  is required',
            'branchName.required' => 'Branch name field is required',
            'branchCode.required' => 'Branch code field is required',
            'accountHolderName.required' => 'Account holder name field  is required',
            'accountType.required' => 'Account type field is required',
            'accountNumber.required' => 'Account number field  is required',
        ];
    }
}
