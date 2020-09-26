<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeleteCancelledToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            //
            $table->tinyInteger('cancel_booking_deleted')->default(0)->comment('0 => Not delete, 1 => Delete')->after('advance_payment_amount');
            $table->timestamp('cancel_booking_deleted_at')->nullable()->after('cancel_booking_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            //
            $table->dropColumn(['cancel_booking_deleted', 'cancel_booking_deleted_at']);
        });
    }
}
