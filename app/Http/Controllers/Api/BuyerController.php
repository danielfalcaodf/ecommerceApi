<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\BuyerRequest;
use App\Http\Resources\Buyer as BuyerResource;
use App\Models\Buyer;
use Exception;


/**
 * @group Compradores
 *
 * APIs Módulo Comprador
 *
 */
class BuyerController extends BaseController
{

    /**
     * Buscar todos Compradores
     *
     * Apresenta uma lista de todos os compradores com as informações
     *
     * @group Compradores
     * @authenticated
     *
     *  @return \Illuminate\Http\Response
     */
    public function getBuyers()
    {
        return $this->sendResponse(BuyerResource::collection(Buyer::all()), 'Compradores encontrado!');
    }
    /**
     * Buscar Comprador
     *
     * Apresenta as informações do comprador especificado
     *
     * @urlParam buyer integer required  O ID do comprador
     *
     * @group Compradores
     * @authenticated
     *
     *  @return \Illuminate\Http\Response
     */
    public function getBuyer($buyer)
    {
        $buyer = Buyer::find($buyer);
        if (is_null($buyer)) {
            return $this->sendError('Comprador não encontrado!');
        }

        return $this->sendResponse(new BuyerResource($buyer), 'Comprador encontrado!');
    }

    /**
     * Cadastrar Comprador
     *
     * Cadastrar um comprador, se tudo estiver certo apresenta as informações do comprador
     *
     * @bodyParam iduser string required  O ID do usuário.
     * @bodyParam phone_cell string required  O Telefone ou celular do comprador.
     * @bodyParam cpf string required   CPF do comprador.
     *
     * @group Compradores
     * @authenticated
     *
     *  @param BuyerRequest $request
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
        return $this->sendResponse(new BuyerResource($buyer), 'Comprador cadastrado!', 201);
    }


    /**
     * Editar Comprador
     *
     * Editar um comprador especificado, se tudo estiver certo apresenta as informações do comprador
     *
     * @urlParam buyer integer required O ID do comprador
     *
     * @bodyParam iduser string required  O id do Usuário.
     * @bodyParam phone_cell string required  Telefone ou Celular.
     * @bodyParam cpf string required  CPF.
     *
     * @group Compradores
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer  $buyer
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
            return $this->sendResponse(new BuyerResource($buyer), 'Nenhum dado novo!', 202);
        }
        $buyer->save();
        return $this->sendResponse(new BuyerResource($buyer), 'Comprador alterado!');
    }

    /**
     * Deletar Comprador
     *
     * Deletar um Comprador especificado
     *
     * @urlParam buyer integer required O ID do comprador
     *
     * @group Compradores
     * @authenticated
     *
     * @param  \App\Buyer  $buyer
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
            return $this->sendError('Erro a deletar!', $exception->getMessage(), 400);
        }


        return $this->sendResponse([], 'Comprador deletado!');
    }
}