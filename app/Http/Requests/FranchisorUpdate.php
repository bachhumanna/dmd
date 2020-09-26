<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchisorUpdate extends FormRequest {

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
        $id = $this->route('franchisor');
        return [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric|digits_between:10,12',
            'address' => 'required',
            'locality' => 'required|min:1|max:100',
            //'town' => 'required|min:1|max:100',
            //'postcode' => 'required',
        ];
    }

}
