<?php

namespace App;


use App\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function images()
    {

        return  $this->hasMany(ProductImage::class, 'idprod');
    }
}
