<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleCreate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['role.create'])) {
            return true;
        } else {
            return false;
        }
    }

    public function rules() {
        return [
            "name" => 'required|unique:roles',
            "display_name" => 'required',
            "description" => 'required',
            'rolePermission' => 'required'
        ];
    }

    public function messages() {
        return [];
    }

}
