<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Franchisee;
use Carbon\Carbon;

class CompanyExpiryStatus extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'company-expiry:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        Franchisee::where('franchise_license_renewal_status', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))
                ->update(['franchise_license_renewal_status' => 1]);

        Franchisee::where('employers_liability_insurance_status', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))
                ->update(['employers_liability_insurance_status' => 1]);

        Franchisee::where('public_liability_insurance_status', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))
                ->update(['public_liability_insurance_status' => 1]);
    }

}
