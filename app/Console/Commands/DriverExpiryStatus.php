<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\DrivingDetails;
use Carbon\Carbon;

class DriverExpiryStatus extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'driver-expiry:status';

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
        DrivingDetails::where('phl_expiry_date', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))
                ->update(['phl_expiry_status' => 1]);

        DrivingDetails::where('renewal_date', '<', Carbon::now()->addDays(env('EXPIRY_DATE')))
                ->update(['renewal_status' => 1]);
    }

}
