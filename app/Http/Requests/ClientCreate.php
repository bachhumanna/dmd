<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        
        return [
            'firstname' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'email' => 'nullable|email',            
            'phone' => 'nullable|numeric|digits_between:10,12',
            'paying_bill' => 'required',
            "dob" => 'required|date_format:m/d/Y',
           // 'house_number' => 'required',
//            'street' => 'required|min:5|max:255',
//            'street' => 'required|min:1|max:100',
//            'city' => 'required|min:1|max:100',            
//            'postcode' => 'required',            
            'address' => 'required',            
        ];
    }

}
