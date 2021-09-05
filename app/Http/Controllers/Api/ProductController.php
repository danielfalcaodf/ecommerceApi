<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use App\models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductController extends BaseController
{
    public function addProduct(Request $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->type = $request->type;
        $product->value = $request->value;
        $product->save();

        if (empty($request->allFiles())) {


            $fileAddress = public_path() . "/demos/products/img/semFoto.jpg";

            $file = new UploadedFile($fileAddress, 'file');
            $request->files->set('semFoto', $file);

            $productsImages = new ProductImage();
            $productsImages->idprod = $product->id;
            $productsImages->path =   $request->files->get('semFoto')->store("products/imgs/{$product->id}");
            $productsImages->save();
        } else {
            foreach ($request->allFiles()['images'] as $key => $value) {
                $file = $value;
                $productsImages = new ProductImage();
                $productsImages->idprod = $product->id;
                $productsImages->path = $file->store("products/imgs/{$product->id}");
                $productsImages->save();
                unset($productsImages);
            }
        }


        return $this->sendResponse(new ProductResource($product), 'Produto cadastrado!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        //
        $products = Product::all();

        return $this->sendResponse(ProductResource::collection($products), 'Produtos encontrado!');
    }
    /**
     * Display the specified resource.
     *
     * @param  mixed $product
     * @return \Illuminate\Http\Response
     */

    public function getProduct($product)
    {
        $product = Product::find($product);
        if (is_null($product)) {
            return $this->sendError('Produto não encontrado!');
        }

        return $this->sendResponse(new ProductResource($product), 'Produto encontrado!');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Request $request, $product)
    {
        //
        $product =  Product::find($product);
        if (is_null($product)) {
            return $this->sendError('Produto não encontrado!');
        }
        $product->name = $request->name;
        $product->type = $request->type;
        $product->value = $request->value;
        if (!$product->wasChanged()) {

            return $this->sendResponse(new ProductResource($product), 'Nenhum dado novo!');
        }
        $product->save();
        return $this->sendResponse(new ProductResource($product), 'Produto alterado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($product)
    {

        try {
            //
            $product =  Product::find($product);
            if (is_null($product)) {
                return $this->sendError('Produto não encontrado!');
            }
            $product->delete();
        } catch (Exception $exception) {
            return $this->sendError('Erro a deletar!', $exception->getMessage());
        }


        return $this->sendResponse([], 'Produto deletado!');
    }
}