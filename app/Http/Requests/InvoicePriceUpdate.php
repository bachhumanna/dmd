<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoicePriceUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'from_turnover' => 'required',
            'to_turnover' => 'required',
            'base_fee' => 'required',
            'plus_excess' => 'required',
            'max_monthly' => 'required'
        ];
    }
}
