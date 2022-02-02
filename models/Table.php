<?php

namespace Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Table extends Eloquent
{
    protected $table = 'table';

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