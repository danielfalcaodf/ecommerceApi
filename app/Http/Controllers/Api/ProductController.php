<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        //
        $products = Product::all();

        return $this->sendResponse(ProductResource::collection($products), 'Produtos encontrado!');
    }


    /**
     * Display the specified resource.
     *
     * @param  mixed $product
     * @return \Illuminate\Http\Response
     */

    public function getProduct($product)
    {
        //

        $product = Product::find($product);
        if (is_null($product)) {
            return $this->sendError('Produto não encontrado!');
        }

        return $this->sendResponse(new ProductResource($product), 'Produto encontrado!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}