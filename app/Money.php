<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'value'];

    public function box()
    {
        return $this->belongsToMany('App\Box', 'box_moneys');
    }

    public function getHumanValue()
    {
        return '$' . number_format($this->value , 2);
    }
}
