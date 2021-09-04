<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Checkout as CheckoutResources;
use App\Models\Checkout;

use App\Models\CheckoutsProduct;
use App\Models\Product;
use Illuminate\Http\Request;

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

        return $this->sendResponse(CheckoutResources::collection($checkouts), 'Produtos encontrado!');
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
        $checkout = Checkout::find($checkout)->where('iduser', $user->id)->first();
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
    public function addCheckout(Request $request)
    {
        //
        $user = (new UserController)->user();

        $total = 0;
        $checkout = new Checkout();

        $checkout->iduser = $user->id;
        $checkout->save();
        $arrCheckProducts = [];
        foreach ($request->products as $key => $value) {
            $product  = Product::find($value['id']);
            if (is_null($product)) {
                return $this->sendError('Produto não encontrado!');
            }

            $checkProduct = new CheckoutsProduct();
            $checkProduct->idcheck = $checkout->id;
            $checkProduct->idprod = $product->id;
            $checkProduct->quant = $value['quant'];
            $checkProduct->subtotal = $value['quant'] * $product->value;
            $total += $checkProduct->subtotal;
            $checkProduct->save();
            $arrCheckProducts['checkProducts'][] = $checkProduct->attributesToArray();
        }

        $checkout->value_total =  $total;
        $checkout->save();
        $data = array_merge($checkout->attributesToArray(), $arrCheckProducts);
        return $this->sendResponse($data, 'Pedido criado com sucesso!');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}