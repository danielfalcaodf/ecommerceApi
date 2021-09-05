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
            'idbuyer' => $this->idbuyer,
            'status' => $this->status,
            'value_total' => $this->value_total,
            'buyer' => $this->getBuyer(),
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'checkProducts' => $this->listCheckProducts(),
            'link' => [
                'get' => [
                    'getCheckouts' => route('checkouts.getCheckouts'),
                    'getCheckout' => route('checkouts.getCheckout', ['checkout' => $this->id]),
                ],
                'post' => [
                    'addCheckout' => route('checkouts.addCheckout')
                ],
                'put' => ''
            ]
        ];
    }
}