<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\SubscriptionPlan;

class SubscriptionPlanUpdate extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (permit(['subscription-plan.edit'])) {
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
        $id = $this->route('subscription_plan');
        $subscriptionPlan = SubscriptionPlan::find($id);
        if ($subscriptionPlan->subscription_type == 1) {
            return [
                'value' => 'required',
                'description' => "required",
                'trial_days' => 'required|integer',
                "invoice_description" => 'required',
                "invoice_gst_price" => 'required|numeric',
                "invoice_total_price" => 'required|numeric'
            ];
        } else if ($subscriptionPlan->subscription_type == 2) {
            return [
                'value' => 'required|integer',
                'description' => "required",
                'validity_for' => 'required|integer',
                "invoice_description" => 'required',
                "invoice_gst_price" => 'required|numeric',
                "invoice_total_price" => 'required|numeric'
            ];
        } else {
            return [];
        }
    }

    public function messages() {
        $id = $this->route('subscription_plan');
        $subscriptionPlan = SubscriptionPlan::find($id);

        if ($subscriptionPlan->subscription_type == 1) {
            return [
                'value.required' => 'The Stripe Plan Id field is required',
                'invoice_total_price.*' => "The Excluding GST Price must be a numeric.",
                'invoice_gst_price.*' => "The Excluding GST Price must be a numeric."
            ];
        } else if ($subscriptionPlan->subscription_type == 2) {
            return [
                'value.required' => 'The Amount field is required.',
                'value.integer' => 'The Amount must be an numeric.',
                'invoice_total_price.*' => "The Excluding GST Price must be a numeric.",
                'invoice_gst_price.*' => "The Excluding GST Price must be a numeric."
            ];
        } else {
            return [];
        }
    }

}
