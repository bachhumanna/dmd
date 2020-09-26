<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchisorCreate extends FormRequest {

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
            'name'      => 'required|min:2|max:255',
            'password'  => 'required|max:255',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|numeric',
            'address'    => 'required',
            'locality'  => 'required|min:1|max:100',
            //'town'      => 'required|min:1|max:100',
            //'postcode'  => 'required',
            'dob'       => 'required',
        ];
    }

}
