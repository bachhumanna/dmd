<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Vehicles;
use Carbon\Carbon;

class VehicleExpiryStatus extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicle-expiry:status';

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
        Vehicles::where('tax_renewal_date', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))->update(['tax_renewal_status' => 1]);
        Vehicles::where('insurance_date', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))->update(['insurance_status' => 1]);
        Vehicles::where('mot_date', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))->update(['mot_status' => 1]);
    }

}
