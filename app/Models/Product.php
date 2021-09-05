<?php

namespace App\Models;


use App\models\ProductImage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function images()
    {

        return  $this->hasMany(ProductImage::class, 'idprod');
    }
}