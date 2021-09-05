<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckoutsProducts extends JsonResource
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
            'idcheck' => $this->idcheck,
            'idprod' => $this->idprod,
            'quant' => $this->quant,
            'subtotal' => $this->subtotal,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'link' => [
                'get' => [
                    'getProduct' => route('products.getProduct', ['product' => $this->id]),
                    'getProducts' => route('products.getProducts')
                ],
                'post' => '',
                'put' => ''
            ]
        ];
    }
}