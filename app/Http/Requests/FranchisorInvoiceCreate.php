<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FranchisorInvoiceCreate extends FormRequest {

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
            'franchisees_id' => 'required',
            'invoice_for_month' => 'required',
            'invoice_for_year' => 'required',
            'turnover' => 'required',
            'standard_fee' => 'required',
            'amount' => 'required',
        ];
    }

}
