<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SUBE extends Model
{
    public $table = "sube";

    protected $fillable = ['id_pos', 'sn'];

}
