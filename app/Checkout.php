<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public function listCheckProducts()
    {

        return  $this->hasMany(CheckoutsProduct::class, 'idcheck');
    }
    public function getBuyer()
    {
        return $this->belongsTo(Buyer::class, 'idbuyer');
    }
}
