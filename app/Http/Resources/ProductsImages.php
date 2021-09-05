<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductsImages extends JsonResource
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
            'idprod' => $this->idprod,
            'path' => asset("storage/" . $this->path),
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'link' => [
                'get' =>
                [
                    'getProducts' => route('products.getProducts'),
                    'getProduct' => route('products.getProduct', ['product' => $this->idprod]),
                    'img' => asset("storage/" . $this->path)
                ],
                'post' => '',
                'delete' => ''

            ]
        ];
    }
}