<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadSensors extends Model
{
    public $timestamps = false;

    protected $table = 'readsensor';

    protected $guarded = [];
}
