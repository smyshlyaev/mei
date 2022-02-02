<?php

namespace Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Table extends Eloquent
{
    protected $table = 'table';

    public $timestamps = false;

    protected $fillable = [
        'table_id'
    ];
}