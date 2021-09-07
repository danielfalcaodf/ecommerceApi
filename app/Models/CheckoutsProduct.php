<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutsProduct extends Model
{
    //

    public function product()
    {
        # code...
        return $this->belongsTo(Product::class, 'idprod');
    }
    public function checkout()
    {
        # code...
        return $this->belongsTo(Checkout::class, 'idcheck');
    }
}
