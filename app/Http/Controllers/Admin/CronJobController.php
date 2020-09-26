<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicles;
use App\DrivingDetails;
use Carbon\Carbon;
use App\Franchisee;

class CronJobController extends Controller {

    public function vehicleExpiryStatus(Request $request) {

        Vehicles::where('tax_renewal_date', '<', Carbon::now()->addDays(45))
                ->update(['tax_renewal_status' => 1]);

        Vehicles::where('diff_insurance_date', '<', Carbon::now()->addDays(45))
                ->update(['diff_insurance_date' => 1]);

        Vehicles::where('mot_status', '<', Carbon::now()->addDays(45))
                ->update(['mot_status' => 1]);
    }

    public function driverExpiryStatus(Request $request) {

        DrivingDetails::where('phl_expiry_date', '<', Carbon::now()->addDays(45))
                ->update(['phl_expiry_status' => 1]);

        DrivingDetails::where('renewal_date', '<', Carbon::now()->addDays(45))
                ->update(['renewal_status' => 1]);
    }

    public function companyExpiryStatus(Request $request) {

        Franchisee::where('franchise_license_renewal_status', '<', Carbon::now()->addDays(45))
                ->update(['franchise_license_renewal_status' => 1]);

        Franchisee::where('employers_liability_insurance_status', '<', Carbon::now()->addDays(45))
                ->update(['employers_liability_insurance_status' => 1]);

        Franchisee::where('public_liability_insurance_status', '<', Carbon::now()->addDays(45))
                ->update(['public_liability_insurance_status' => 1]);
    }

}
