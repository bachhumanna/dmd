<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use Kyslik\ColumnSortable\Sortable;

class BookingInvoiceOverride extends Model {

    use Sortable;
    use FranchiseeTraits;

    public $table = "booking_invoice_override";

    //protected $dateFormat = 'Y-m-d';

    protected $fillable = [
        "booking_id","franchisees_id", "invoice_id", "payment_status", "client_id", "booking_count", "total_amount", "outstanding_amount","discount_amount", "vat_amount", "due_date", "invoice_date", "invoice_number", "note", "customer_addres", "franchisees_addressee", "user_id"
    ];

    protected $casts = [
        //'invoice_date' => 'date_format:yyyy-mm-dd',
        //'invoice_date'  => 'date:Y-m-d',
    ];

    public function client() {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }

    public function booking() {
        return $this->belongsTo('App\Booking', 'id', 'group_invoice_id');
    }
}
