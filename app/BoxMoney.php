<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoxMoney extends Model
{
    public $timestamps = false;

    protected $fillable = ['box_id', 'money_id', 'quantity'];
}
