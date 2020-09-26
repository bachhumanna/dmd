<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchiseeUpdate extends FormRequest {

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
            'name' => 'required|min:2|max:255',
            'contact_person_name' => 'required|max:255',
            'contact_person_email' => 'required|email|max:255',
            'contact_person_phone' => 'required|min:10|max:50',
            'company_name' => 'required',
            'company_number' => 'required',
            'registered_office' => 'required',
            'incorporation_date' => 'required',
            //'company_yearend' => 'required',
            //'conf_stat_date' => 'required',
            'address' => 'required|max:255',
            //'locality' => 'required|max:100',
            //'town' => 'required|max:100',
            //'postcode' => 'required|max:10',
            'public_liability_insurance' => 'required',
            'employers_liability_insurance' => 'required',
            'franchise_license_renewal_date' => 'required',
            //'company_year_end' => 'required',
            //'confirmation_statement_date' => 'required',
            'driver_cost' => 'required|numeric',
            //'cost_per_mile' => 'required|numeric',
            'vehicle_cost' => 'required|numeric',
            'paid_mileage' => 'required|numeric',
            'base_driving_cost' => 'required|numeric',
            'waiting_time_cost' => 'required|numeric',
            'companionship_cost' => 'required|numeric',
            'bank_account_no' => 'required|numeric',
            'account_name' => 'required',
            'base_location' => 'required',
        ];
    }

}
