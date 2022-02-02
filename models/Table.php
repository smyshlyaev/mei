<?php

namespace Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Table extends Eloquent
{
    protected $table = 'tables';

    public $timestamps = false;

    protected $fillable = [
        'value',
        'table_id',
        'company',
        'fact_or_forecast',
        'oliq_or_qoil',
        'date'
    ];
}