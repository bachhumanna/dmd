<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Vehiclesrequest extends FormRequest
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
            //'body_type' => 'required',
            'vehicles_model' => 'required',
            'vehicles_company' => 'required',
            'vehicles_number' => 'required',
            'max_capacity' => 'required',
            'phv_licence_number' => 'required',
            'phv_issue_date' => 'required',
            'phv_expiry_date' => 'required',
            'tax_renewal_date' => 'required',
            'insurance_date' => 'required',
            'mot_date' => 'required',
            
            
            
            
        ];
    }
}
