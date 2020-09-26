<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchiseesPriceUpdate extends FormRequest {

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
            'vehicle_cost' => 'required|numeric',
            'paid_mileage' => 'required|numeric',
            'base_driving_cost' => 'required|numeric',
            'waiting_time_cost' => 'required|numeric',
            'companionship_cost' => 'required|numeric',
        ];
    }

}
