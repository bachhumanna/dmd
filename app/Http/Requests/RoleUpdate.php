<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class RoleUpdate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['role.edit'])) {
            return true;
        } else {
            return false;
        }
    }

    public function rules() {
        
       $name = $this->route('role');
        return [
            'name' => 'required|unique:roles,name,'.$name ,
            'rolePermission'=>'required',
            "display_name" => 'required',
            "description" => 'required',
        ];
    }

    public function messages() {
        return [];
    }

}
