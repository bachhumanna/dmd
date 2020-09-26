<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateUpdate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['email-template.edit'])) {
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
        return [
            "title" => 'required',
            "subject" => 'required',
            'from_name' => 'required',
            "from_email" => 'required|email',
            'description' => 'required',
            'content' => 'required',
        ];
    }

}
