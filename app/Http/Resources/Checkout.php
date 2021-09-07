<?php

namespace App\Http\Resources;


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
            'value_total' => number_format($this->value_total, 2),
            'buyer' => new Buyer($this->getBuyer),
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'checkProducts' => CheckoutsProducts::collection($this->listCheckProducts),
            'link' => [
                'get' => [
                    'getCheckouts' => route('checkouts.getCheckouts'),
                    'getCheckout' => route('checkouts.getCheckout', ['checkout' => $this->id]),
                    'getCheckoutsAll' => route('checkouts.getCheckoutsAll'),
                    'getCheckoutBuyer' => route('checkouts.getCheckoutBuyer', ['checkout' => $this->id]),


                ],
                'post' => [
                    'addCheckout' => route('checkouts.addCheckout'),
                    'addCheckoutBuyer' => route('checkouts.addCheckoutBuyer')
                ],
                'put' => [
                    'editCheckout' => route('checkouts.editCheckout', ['checkout' => $this->id])

                ],
                'delete' =>  [
                    'deleteCheckout' => route('checkouts.deleteCheckout', ['checkout' => $this->id])
                ]
            ]
        ];
    }
}