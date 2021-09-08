<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CheckoutRequest;
use App\Http\Resources\Checkout as CheckoutResources;
use App\Mail\newMailCheckout;
use App\Models\Buyer;
use App\Models\Checkout;

use App\Models\CheckoutsProduct;
use App\Models\Product;
use FFI\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

/**
 * @group Pedidos
 *
 * API Módulo Pedido
 *
 */

class CheckoutController extends ApiController
{

    /**
     * Buscar todos pedidos do usuário
     *
     * Apresenta todos os pedidos do usuário logado que foi passado com JWT
     *
     * @responseFile scenario=(result) responses/checkouts/getCheckouts.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos
     * @groupDescription API Módulo Comprador
     * @authenticated
     *
     *  @return \Illuminate\Http\Response
     */
    public function getCheckouts()
    {
        $user = (new UserController)->user();
        if (!$buyer = Buyer::where('iduser', $user->id)->first()) {

            return $this->sendError('Você não tem pedidos');
        }
        $checkouts = Checkout::where('idbuyer', $buyer->id)->get();
        if ($checkouts->isEmpty()) {
            return $this->sendError('Você não tem pedidos');
        }


        return $this->sendResponse(CheckoutResources::collection($checkouts), 'Pedidos encontrados!');
    }
    /**
     * Buscar pedido do usuário
     *
     *
     * Apresenta um pedido especificado do usuário logado que foi passado com JWT, mostrando só o pedido dele
     * @urlParam checkout integer required  O ID do pedido
     *
     * @responseFile scenario=(result) responses/checkouts/getCheckout.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos
     * @authenticated
     *
     *  @return \Illuminate\Http\Response
     */
    public function getCheckout($checkout)
    {
        $user = (new UserController)->user();

        if (!$buyer = Buyer::where('iduser', $user->id)->first()) {
            return $this->sendError('Você não tem pedidos');
        }
        $checkout = Checkout::find($checkout)->where('idbuyer', $buyer->id)->first();
        if (is_null($checkout)) {
            return $this->sendError('Pedindo não encontrado!');
        }

        return $this->sendResponse(new CheckoutResources($checkout), 'Pedindo encontrado!');
    }

    /**
     * Cadastrar pedido do usuário
     *
     *
     * Cadastrar um pedido do usuário logado, que foi passado com JWT. Caso o usuário
     * não tenha cadastro como comprador, deve informa o CPF e Telefone ou celular do usuário para criar ele como comprador.
     * Se estiver tudo certo será enviado um email ao comprador com a confirmação do pedido
     *
     * @bodyParam products object[] required A lista dos produtos do pedido Example: [{"id":"4", "quant":"6"},{"id":"7", "quant":"2"},{"id":"2", "quant":"3"}]
     * @bodyParam products[].id string required O ID do produto.
     * @bodyParam products[].quant string required A quantidade do produto.
     * @bodyParam phone_cell string O telefone ou celular válido. Example: (12) 99994-2999
     * @bodyParam cpf string O CPF válido.  Example: 68181045092
     *
     * @responseFile status=201 scenario=(result) responses/checkouts/addCheckout.201.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos
     * @authenticated
     *
     *  @param CheckoutRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function addCheckout(CheckoutRequest $request)
    {
        //
        $user = (new UserController)->user();

        if (!$buyer = Buyer::where('iduser', $user->id)->first()) {
            $request->merge(['iduser' => $user->id]);
            $validator = Validator::make($request->only(['phone_cell', 'cpf', 'iduser']), [
                'phone_cell' => 'required|celular_com_ddd',
                'cpf' => 'required|cpf',
                'iduser' => 'unique:buyers',

            ]);

            if ($validator->fails()) {
                return $this->sendError('Campos Inválidos', $validator->errors(), 422);
            }

            $buyer = new Buyer();
            $buyer->iduser = $user->id;
            $buyer->phone_cell = $request->phone_cell;
            $buyer->cpf = $request->cpf;
            $buyer->save();
        }


        $total = 0;
        $checkout = new Checkout();

        $checkout->idbuyer = $buyer->id;
        $checkout->save();

        foreach ($request->products as $key => $value) {
            $product  = Product::find($value['id']);
            if (is_null($product)) {
                return $this->sendError('Produto não encontrado!');
            }

            $checkProduct = new CheckoutsProduct();
            $checkProduct->idcheck = $checkout->id;
            $checkProduct->idprod = $product->id;
            $checkProduct->quant = $value['quant'];
            $checkProduct->subtotal = number_format(($value['quant'] * $product->value), 2);
            $total += $checkProduct->subtotal;
            $checkProduct->save();
        }

        $checkout->value_total = number_format($total, 2);
        $checkout->status = "pending";
        $checkout->save();

        Mail::send(new newMailCheckout($checkout));
        return $this->sendResponse(new CheckoutResources($checkout), 'Pedido criado com sucesso!', 201);
    }
    /**
     * Buscar todos pedidos
     *
     * Apresenta uma lista de todos os pedidos com as informações
     *
     * @responseFile scenario=(result) responses/checkouts/getCheckoutsAll.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos ADMIN
     * @authenticated
     *
     *  @return \Illuminate\Http\Response
     */
    public function getCheckoutsAll()
    {

        $checkouts = Checkout::all();
        if ($checkouts->isEmpty()) {
            return $this->sendError('Não tem pedidos');
        }
        return $this->sendResponse(CheckoutResources::collection($checkouts), 'Pedidos encontrado!');
    }

    /**
     * Buscar pedido
     *
     * Apresenta as informações do pedido especificado
     *
     * @urlParam checkout integer required O ID do pedido
     *
     * @responseFile scenario=(result) responses/checkouts/getCheckoutBuyer.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos ADMIN
     * @authenticated
     *
     *  @return \Illuminate\Http\Response
     */
    public function getCheckoutBuyer($checkout)
    {

        $checkout = Checkout::find($checkout);
        if (is_null($checkout)) {
            return $this->sendError('Pedindo não encontrado!');
        }

        return $this->sendResponse(new CheckoutResources($checkout), 'Pedindo encontrado!');
    }

    /**
     * Criar um pedido do comprador
     *
     *
     *
     * Cadastra um pedido do comprador especificando o ID do comprador.
     * Se estiver tudo certo será enviado um email ao comprador com a confirmação do pedido
     *
     * @bodyParam products object[] required A lista dos produtos do pedido Example: [{"id":"4", "quant":"6"},{"id":"7", "quant":"2"},{"id":"2", "quant":"3"}]
     * @bodyParam products[].id string required O ID do produto.
     * @bodyParam products[].quant string required A quantidade do produto.
     * @bodyParam idbuyer string required O ID do comprador . Example: 1
     *
     * @responseFile status=201 scenario=(result) responses/checkouts/addCheckoutBuyer.201.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos ADMIN
     * @authenticated
     *
     *  @param CheckoutRequest $request
     *
     * @return \Illuminate\Http\Response
     */


    public function addCheckoutBuyer(CheckoutRequest $request)
    {
        //

        $buyer = Buyer::find($request->idbuyer);
        if (is_null($buyer)) {
            return $this->sendError('Comprador não encontrado!');
        }
        $total = 0;
        $checkout = new Checkout();

        $checkout->idbuyer = $buyer->id;
        $checkout->save();

        foreach ($request->products as $key => $value) {
            $product  = Product::find($value['id']);
            if (is_null($product)) {
                return $this->sendError('Produto não encontrado!');
            }

            $checkProduct = new CheckoutsProduct();
            $checkProduct->idcheck = $checkout->id;
            $checkProduct->idprod = $product->id;
            $checkProduct->quant = $value['quant'];
            $checkProduct->subtotal = number_format(($value['quant'] * $product->value), 2);
            $total += $checkProduct->subtotal;
            $checkProduct->save();
        }

        $checkout->value_total = number_format($total, 2);
        $checkout->status = "pending";
        $checkout->save();

        Mail::send(new newMailCheckout($checkout));
        return $this->sendResponse(new CheckoutResources($checkout), 'Pedido criado com sucesso!', 201);
    }



    /**
     * Editar Pedido
     *
     *  Editar um pedido (comprador e os produtos) especificado, se tudo estiver certo apresenta as informações do pedido
     *
     * @urlParam checkout integer required O ID do pedido Example: 1
     * @bodyParam products object[] required A lista de produtos do pedido Example: [{"id":"4", "quant":"6"},{"id":"7", "quant":"2"},{"id":"2", "quant":"3"}]
     * @bodyParam products[].id string required O ID do produto.
     * @bodyParam products[].quant string required A quantidade do produto.
     * @bodyParam idbuyer string required O ID do comprador. Example: 1
     *
     * @responseFile status=200 scenario=(result) responses/checkouts/editCheckout.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos ADMIN
     * @authenticated
     *
     * @param  \Illuminate\Http\CheckoutRequest  $request
     * @param mixed $checkout
     * @return \Illuminate\Http\Response
     */
    public function editCheckout(CheckoutRequest $request, $checkout)
    {
        $buyer = Buyer::find($request->idbuyer);
        if (is_null($buyer)) {
            return $this->sendError('Comprador não encontrado!');
        }
        $total = 0;
        $checkout =  Checkout::find($checkout);
        if (is_null($checkout)) {
            return $this->sendError('Pedido não encontrado!');
        }
        $checkout->idbuyer = $buyer->id;

        $CheckoutsProduct = CheckoutsProduct::where('idcheck', $checkout->id)->get();
        foreach ($CheckoutsProduct as $key => $value) {
            # code...
            $value->delete();
        }
        foreach ($request->products as $key => $value) {
            $product  = Product::find($value['id']);
            if (is_null($product)) {
                return $this->sendError('Produto não encontrado!');
            }

            $checkProduct = new CheckoutsProduct();
            $checkProduct->idcheck = $checkout->id;
            $checkProduct->idprod = $product->id;
            $checkProduct->quant = $value['quant'];
            $checkProduct->subtotal = number_format(($value['quant'] * $product->value), 2);
            $total += $checkProduct->subtotal;
            $checkProduct->save();
        }

        $checkout->value_total = number_format($total, 2);
        $checkout->save();

        return $this->sendResponse(new CheckoutResources($checkout), 'Pedido alterado com sucesso!');
    }

    /**
     * Deletar Pedido
     *
     * Deletar um pedido especificado
     *
     * @urlParam checkout integer required O ID do pedido
     *
     * @responseFile status=200 scenario=(result) responses/checkouts/deleteCheckout.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Pedidos ADMIN
     * @authenticated
     *
     * @param   {checkout} $checkout
     * @return \Illuminate\Http\Response
     */
    public function deleteCheckout($checkout)
    {

        try {
            //
            $checkout =  Checkout::find($checkout);
            if (is_null($checkout)) {
                return $this->sendError('Pedido não encontrado!');
            }
            $checkout->delete();
        } catch (Exception $exception) {
            return $this->sendError('Erro a deletar!', $exception->getMessage(), 400);
        }


        return $this->sendResponse([], 'Pedido deletado!');
    }
}
