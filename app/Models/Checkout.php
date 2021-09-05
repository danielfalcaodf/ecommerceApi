<?php

namespace App\Models;

use App\Http\Resources\Buyer as BuyerResource;
use App\Http\Resources\CheckoutsProducts;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public function listCheckProducts()
    {
        return CheckoutsProducts::collection(CheckoutsProduct::where('idcheck', $this->id)->get());
    }
    public function getBuyer()
    {
        return new BuyerResource(Buyer::find($this->idbuyer));
    }
}