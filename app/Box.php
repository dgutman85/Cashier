<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['name'];

    public function money()
    {
        return $this->belongsToMany('App\Money', 'box_moneys')->withPivot('quantity');
    }

    public function getMoney($money)
    {
        return $this->belongsToMany('App\Money', 'box_moneys')->wherePivot('money_id', $money)->withPivot('quantity');
    }
}
