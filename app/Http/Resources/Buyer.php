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
            'cpf' => $this->cpf,
            'user' => new User($this->getUser),
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
            'link' => [
                'get' =>
                [
                    'getBuyers' => route('buyers.getBuyers'),
                    'getBuyer' => route('buyers.getBuyer', ['buyer' => $this->id]),

                ],
                'post' => [
                    'addBuyer' => route('buyers.addBuyer'),
                ],

                'put' => [
                    'editBuyer' => route('buyers.editBuyer', ['buyer' => $this->id]),
                ],

                'delete' => [
                    'deleteBuyer' => route('buyers.deleteBuyer', ['buyer' => $this->id])
                ]

            ]
        ];
    }
}