<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductsImages as ProdImgsResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'value' => number_format($this->value, 2),
            'images' => ProdImgsResource::collection($this->images), //array de images do produto
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'link' => [
                'get' =>
                [
                    'getProducts' => route('products.getProducts'),
                    'getProduct' => route('products.getProduct', ['product' => $this->id])
                ],
                'post' =>  [
                    'addProduct' => route('products.addProduct'),
                ],
                'put' => [
                    'editProduct' => route('products.editProduct', ['product' => $this->id]),
                ],
                'delete' =>
                [
                    'editProduct' => route('products.deleteProduct', ['product' => $this->id]),
                ]
            ]
        ];
    }
}
