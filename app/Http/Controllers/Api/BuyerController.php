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
class BuyerController extends ApiController
{

    /**
     * Buscar todos Compradores
     *
     * Apresenta uma lista de todos os compradores com as informações
     *
     * @responseFile scenario=(result) responses/buyers/getBuyers.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     * @group Compradores
     * @authenticated
     *
     *  @return \Illuminate\Http\Response
     */
    public function getBuyers()
    {
        $buyers = Buyer::all();
        if ($buyers->isEmpty()) {
            return $this->sendError('Não encontrado!');
        }
        return $this->sendResponse(BuyerResource::collection($buyers), 'Compradores encontrado!');
    }
    /**
     * Buscar Comprador
     *
     * Apresenta as informações do comprador especificado
     *
     * @responseFile scenario=(result) responses/buyers/getBuyer.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=404 scenario="Não encontrado" responses/buyers/getBuyer.404.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
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
     * @bodyParam iduser string required  O ID do usuário. Example: 22
     * @bodyParam phone_cell string required  O Telefone ou celular do comprador. Example: (12) 99999-9999
     * @bodyParam cpf string required   CPF do comprador. Example: 71123045046
     * @responseFile status=201 scenario=(result) responses/buyers/addBuyer.201.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Validação bodyparam" responses/buyers/addBuyer.422.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
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
     * @urlParam buyer integer required O ID do comprador. Example: 22
     *
     * @bodyParam phone_cell string required  Telefone ou Celular. Example: (12) 92999-9999
     * @bodyParam cpf string required  CPF. Example: 74043044070
     * @bodyParam iduser string  O id do Usuário. Example: 22
     *
     * @responseFile status=201 scenario=(result) responses/buyers/editBuyer.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Compradores
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyer $buyer
     * @return \Illuminate\Http\Response
     */
    public function editBuyer(BuyerRequest $request, $buyer)
    {

        $buyer =  Buyer::find($buyer);
        if (is_null($buyer)) {
            return $this->sendError('Comprador não encontrado!');
        }
        $buyer->phone_cell = $request->phone_cell;
        $buyer->cpf = $request->cpf;
        if (!$buyer->isDirty()) {
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
     * @responseFile status=201 scenario=(result) responses/buyers/deleteBuyer.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Compradores
     * @authenticated
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
            return $this->sendError('Erro a deletar!', $exception->getMessage(), 400);
        }


        return $this->sendResponse([], 'Comprador deletado!');
    }
}
