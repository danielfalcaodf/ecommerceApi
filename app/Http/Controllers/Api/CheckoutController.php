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

class CheckoutController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCheckouts()
    {
        $user = (new UserController)->user();
        $checkouts = Checkout::where('iduser', $user->id)->get();

        return $this->sendResponse(CheckoutResources::collection($checkouts), 'Pedidos encontrado!');
    }
    public function getCheckoutsAll()
    {

        $checkouts = Checkout::all();

        return $this->sendResponse(CheckoutResources::collection($checkouts), 'Pedidos encontrado!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
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
    public function getCheckoutBuyer($checkout)
    {

        $checkout = Checkout::find($checkout);
        if (is_null($checkout)) {
            return $this->sendError('Pedindo não encontrado!');
        }

        return $this->sendResponse(new CheckoutResources($checkout), 'Pedindo encontrado!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
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