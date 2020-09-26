<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanionUpdate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['companion.edit'])) {
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
        $name = $this->route('driver');
        return [
            'name'      => 'required|min:4|max:255',
            'email'     => 'required|email|unique:users,email,' .$this->route('companion'),
            //'email'     => 'required|email|unique:users,email,' . $name,
            'dob'       => 'required|date',
            'phone'     => 'required|numeric|digits_between:10,12',
            'address'    => 'required',
            //'locality'  => 'required|min:1|max:100',
            //'town'      => 'required|min:1|max:100',
            //'postcode'  => 'required',
            //'licence_no'=> 'required',
            //'licence_expiry_date' => 'required',
            //'driver_experience' => 'required',

            ///'phl_number'=> 'required',
            //'phl_image' => 'nullable|mimes:jpeg,png,jpg',
            //'driver_experience' => 'required',
            //'phl_expiry_date' =>'required',
            'national_insurance_no' =>'required',
            'passport_number' => 'required',
            'passport_image' => 'nullable|mimes:jpeg,png,jpg',
            'renewal_date' =>'required',
            'driverVehicles.vehicle_id' =>'required',
        ];
    }

}
