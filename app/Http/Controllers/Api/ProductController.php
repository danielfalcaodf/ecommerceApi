<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use App\Models\ProductImage;
use Exception;

use Illuminate\Http\UploadedFile;

/**
 * @group Produtos
 *
 * API Módulo Produto
 */
class ProductController extends ApiController
{


    /**
     * Cadastrar um produto
     *
     *
     * Cadastrar um produto com foto ou não, se tudo estiver certo apresenta as informações do produto
     *
     * @bodyParam name string required  Um nome do produto.
     * @bodyParam type string required  O tipo do produto.
     * @bodyParam value number required Valor do produto.
     * @bodyParam images[] file As imagens do produto, se não tiver, automanticamente a API irá entender e vai colocar uma foto padrão (semFoto.jpg).
     *
     * @responseFile status=201 scenario=(result) responses/products/addProduct.201.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Produtos
     * @authenticated
     *
     *  @param ProductRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(ProductRequest $request)
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


        return $this->sendResponse(new ProductResource($product), 'Produto cadastrado!', 201);
    }

    /**
     * Buscar todos os produtos
     *
     * Apresenta uma lista de todos os produtos com as informações
     *
     * @responseFile scenario=(result) responses/products/getProducts.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Produtos
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        //
        $products = Product::all();
        if ($products->isEmpty()) {
            return $this->sendError('Não tem produtos');
        }
        return $this->sendResponse(ProductResource::collection($products), 'Produtos encontrado!');
    }

    /**
     * Buscar produto
     *
     * Apresenta as informações do produto especificado
     *
     * @responseFile scenario=(result) responses/products/getProduct.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @urlParam product integer required O ID do produto
     *
     * @group Produtos
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
     * Editar produto
     *
     * Editar um produto especificado, se tudo estiver certo apresenta as informações do produto
     *
     * @urlParam product integer required O ID do produto
     * @bodyParam name string required  Um nome do produto.
     * @bodyParam type string required  O tipo do produto.
     * @bodyParam value number required Valor do produto.
     *
     * @responseFile scenario=(result) responses/products/editProduct.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Produtos
     * @authenticated
     *
     * @param  ProductRequest  $request
     * @param  mixed $product
     * @return \Illuminate\Http\Response
     */
    public function editProduct(ProductRequest $request, $product)
    {
        //
        $product =  Product::find($product);
        if (is_null($product)) {
            return $this->sendError('Produto não encontrado!');
        }
        $product->name = $request->name;
        $product->type = $request->type;
        $product->value = $request->value;
        if (!$product->isDirty()) {

            return $this->sendResponse(new ProductResource($product), 'Nenhum dado novo!', 202);
        }
        $product->save();
        return $this->sendResponse(new ProductResource($product), 'Produto alterado!');
    }

    /**
     * Deletar produto
     *
     * Deletar um produto especificado
     *
     * @urlParam product integer required O ID do produto
     *
     * @responseFile scenario=(result) responses/products/deleteProduct.200.json
     * @responseFile status=401 scenario="Token is Invalid, Token is Expired, Authorization Token not found" responses/token.invalid.json
     * @responseFile status=422 scenario="Erros semânticos do código" responses/errorsInCode.json
     *
     * @group Produtos
     * @authenticated
     *
     * @param  mixed $product
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
            return $this->sendError('Erro a deletar!', $exception->getMessage(), 400);
        }


        return $this->sendResponse([], 'Produto deletado!');
    }
}
