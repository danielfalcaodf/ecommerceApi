<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BuyerRequest;
use App\Http\Resources\Buyer as BuyerResource;
use App\Models\Buyer;
use Exception;
use Illuminate\Http\Request;

class BuyerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBuyer(BuyerRequest $request)
    {



        $buyer = new Buyer();
        $buyer->iduser = $request->iduser;
        $buyer->phone_cell = $request->phone_cell;
        $buyer->cpf = $request->cpf;
        $buyer->save();
        return $this->sendResponse(new BuyerResource($buyer), 'Comprador cadastrado!');
    }
    public function getBuyers()
    {
        return $this->sendResponse(BuyerResource::collection(Buyer::all()), 'Compradores encontrado!');
    }
    public function getBuyer($buyer)
    {
        $buyer = Buyer::find($buyer);
        if (is_null($buyer)) {
            return $this->sendError('Comprador não encontrado!');
        }

        return $this->sendResponse(new BuyerResource($buyer), 'Comprador encontrado!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function editBuyer(BuyerRequest $request, $buyer)
    {

        $buyer =  Buyer::find($buyer);
        if (is_null($buyer)) {
            return $this->sendError('Comprador não encontrado!');
        }
        $buyer->iduser = $request->iduser;
        $buyer->phone_cell = $request->phone_cell;
        $buyer->cpf = $request->cpf;
        if (!$buyer->wasChanged()) {
            return $this->sendResponse(new BuyerResource($buyer), 'Nenhum dado novo!');
        }
        $buyer->save();
        return $this->sendResponse(new BuyerResource($buyer), 'Comprador alterado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function deleteBuyer($buyer)
    {

        try {
            //
            $buyer =  Buyer::find($buyer);
            if (is_null($buyer)) {
                return $this->sendError('Comprador não encontrado!');
            }
            $buyer->delete();
        } catch (Exception $exception) {
            return $this->sendError('Erro a deletar!', $exception->getMessage());
        }


        return $this->sendResponse([], 'Comprador deletado!');
    }
}