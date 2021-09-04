<?php

namespace App\Http\Resources;

use App\Models\CheckoutsProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class Checkout extends JsonResource
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
            'iduser' => $this->iduser,
            'status' => $this->status,
            'value_total' => $this->value_total,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'checkProducts' => $this->listCheckProducts(),
            'link' => [
                'get' => route('products.getProduct', ['product' => $this->id]),
                'post' => '',
                'put' => ''
            ]
        ];
    }
}