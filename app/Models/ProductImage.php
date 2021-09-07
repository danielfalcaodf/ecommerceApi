<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'products_images';

    public function product()
    {
        # code...
        return $this->belongsTo(Product::class, 'idprod');
    }
}