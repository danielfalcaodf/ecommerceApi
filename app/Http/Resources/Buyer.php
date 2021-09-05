<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Buyer extends JsonResource
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
            'phone_cell' => $this->phone_cell,
            'cpf' => $this->phone_cell,
            'user' => $this->getUser(),
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'link' => [
                'get' =>
                [
                    'getProducts' => route('products.getProducts'),
                    'getProduct' => route('products.getProduct', ['product' => $this->id])
                ],
                'post' => '',
                'put' => ''
            ]
        ];
    }
}