<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchiseeUserUpdate extends FormRequest {

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
            //'franchisees_id' => 'required',
            'name'      => 'required|min:4|max:255',
            'email'     => 'required|email|unique:users,email,' .$this->route('franchisee_user'),
            'dob'       => 'required|date',
            'phone'     => 'required|numeric|digits_between:10,12',
            'address'    => 'required|min:5|max:255',
            //'locality'  => 'required|min:1|max:100',
            //'town'      => 'required|min:1|max:100',
            //'postcode'  => 'required',
        ];
    }

}
