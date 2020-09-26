<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize() {
        return true;
    }

    public function rules() {
        return [
//            "name" => 'required',
//            "email" => 'nullable|email',
//            "phone_number" => 'nullable|numeric',
            //"booking_time" => 'required|date_format:Y-m-d H:i|after_or_equal:today',
            //"booking_time" => 'required|date_format:Y-m-d H:i',
            "booking_time" => 'required|date_format:m/d/Y H:i',
            "base_location" => 'required',
            "drop_location" => 'required',
            "outward_companion" => 'nullable|integer',
            "outward_waiting" => 'nullable|integer',
            "journey_type" => 'required',
            "return_companion" => 'nullable|integer',
            "return_waiting" => 'nullable|integer',
            "long_return" => 'nullable|integer',
            "drop_off_to_base" => 'nullable|numeric',
            "payment_mode" => 'required',
            "pickup_location.1" => 'required',
            "pickup_distance.1" => 'required',
            "pickup_distance.2" => "required_with:pickup_location.2",
            "pickup_distance.3" => "required_with:pickup_location.2",
            "drop_location" => 'required',
            "drop_location_distance" => 'required',
            "drop_location_travel_time" => 'required',
        ];
    }

    public function messages() {
        return [
            'pickup_location.1.*' => 'The pickup location A field is required',
            'pickup_location.2.*' => 'The pickup location B field is required',
            'pickup_location.3.*' => 'The pickup location C field is required',
            'pickup_distance.1.*' => 'This field is required',
            'pickup_distance.2.*' => 'This field is required',
            'pickup_distance.3.*' => 'This field is required',
        ];
    }
}
