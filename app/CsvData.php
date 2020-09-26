<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    protected $table = 'franchisees';
    protected $fillable = ['name', 'contact_person_name'];
}