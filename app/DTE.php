<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DTE extends Model
{
    public $table = 'dte';

    protected $fillable = ['nro_tel', 'sim', 'imei'];
}
