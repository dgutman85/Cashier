<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['type','motive','amount','responsable','box_id'];

    public function scopeOfType($query, $type) {
        if(!empty($type)) {
            return $query->where('type', $type);
        }

        return false;
    }

    public function scopeOfDate($query, $date)
    {
        if(!empty($date)) {
            return $query->where('created_at','LIKE', "%$date%");
        }

        return false;
    }
}
