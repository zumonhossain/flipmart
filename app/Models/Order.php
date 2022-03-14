<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    use HasFactory;

    protected $guarded = [];

    public function division(){
        return $this->belongsTo('App\Models\ShipDivision');
    }
    public function district(){
        return $this->belongsTo('App\Models\ShipDistrict');
    }

    public function state(){
        return $this->belongsTo('App\Models\ShipState');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
