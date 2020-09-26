<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest {

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
            'phone' => 'required|numeric',
            'street' => 'required|min:5|max:255',
            'locality' => 'required|min:1|max:100',
            'town' => 'required|min:1|max:100',
            'postcode' => 'required',
        ];
    }

}
