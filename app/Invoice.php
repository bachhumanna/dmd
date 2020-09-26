<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\FranchiseeTraits;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Invoice extends Model {

    use Sortable;
    use SoftDeletes;
    use FranchiseeTraits;

    public $table = "invoice";
    public $fillable = [
        "invoice_date", "invoice_number", "reference", "description", "quantity", "unit_price", "amount_gbp","vat_amount", "name","street", "city", "country", "postcode",
    ];

    public function franchisees() {
        return $this->belongsTo('App\Franchisee', 'franchisees_id');
    }
}
