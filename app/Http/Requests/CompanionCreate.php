<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanionCreate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['users.create'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $name = $this->route('user');
        return [
            'name' => 'required|min:4|max:255',
            'email' => 'required|email|unique:users,email,' . $name,
            'dob' => 'required|date',
            //'phone' => 'required|min:10|max:50',
            'phone' => 'required|numeric|digits_between:10,12',
            'address' => 'required',
            //'locality' => 'required|min:1|max:100',
            //'town' => 'required|min:1|max:100',
            //'postcode' => 'required|integer|min:1,10',
            //'postcode' => 'required',
            //'licence_no' => 'required',
            //'licence_expiry_date' => 'required',
            //'driver_experience' => 'required',


            //'phl_number' => 'required',
            //'phl_image' => 'required|mimes:jpeg,png,jpg',

            //'driver_experience' => 'required',
            //'phl_expiry_date' =>'required',
            'national_insurance_no' =>'required',
            'passport_number' => 'required',
            //'passport_image' => 'required|mimes:jpeg,png,jpg',
            'renewal_date' =>'required',
            'vehicle_id' =>'required',
        ];
    }

}
