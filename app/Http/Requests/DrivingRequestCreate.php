<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DrivingRequestCreate extends FormRequest {

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
            'name' => 'required|min:4|max:255',
            'surname' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date',
            'phone' => 'required|numeric|digits_between:10,12',
            'street' => 'required|min:5|max:255',
            'locality' => 'required|min:1|max:100',
            'town' => 'required|min:1|max:100',
            'postcode' => 'required',
            //'drivinglicence_image_pdf' => 'required|mimes:jpeg,png,jpg,pdf',
            //'drivinglicence_image_pdf' => 'required|mimes:jpeg,png,jpg',
            'licence_no' => 'required',
            'phl_number' => 'required',
            //'phl_image' => 'required|mimes:jpeg,png,jpg',
            'licence_expiry_date' => 'required',
            'driver_experience' => 'required',
            'phl_expiry_date' => 'required',
            'national_insurance_no' => 'required',
            'passport_number' => 'required',
            //'passport_image' => 'required|mimes:jpeg,png,jpg',
            'renewal_date' => 'required',
        ];
    }

}
