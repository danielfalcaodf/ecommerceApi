<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
//  AUTH
Route::post('auth/login', 'Api\AuthController@login');
Route::post('auth/register', 'Api\AuthController@register');
// PRODUCTS
Route::get('products/list', 'Api\ProductController@getProducts')->name('products.getProducts');
Route::get('products/view/{product}', 'Api\ProductController@getProduct')->name('products.getProduct');

// AUTH JWT
Route::group(['middleware' => ['apiJwt']], function () {
    //  AUTH USER
    Route::get('me', 'Api\AuthController@me');
    Route::post('logout', 'Api\AuthController@logout');
    // USERS
    Route::get('users', 'Api\UserController@getListAll');
    Route::get('users/me', 'Api\UserController@getMe');
    //BUYERS
    Route::get('buyers/', 'Api\BuyerController@getBuyers')->name('buyers.getBuyers');
    Route::get('buyers/view/{buyer}', 'Api\BuyerController@getBuyer')->name('buyers.getBuyer');
    Route::post('buyers/add', 'Api\BuyerController@addBuyer')->name('buyers.addBuyer');
    Route::put('buyers/edit/{buyer}', 'Api\BuyerController@editBuyer')->name('buyers.editBuyer');
    Route::delete('buyers/delete/{buyer}', 'Api\BuyerController@deleteBuyer')->name('buyers.deleteBuyer');
    //PRODUCTS
    Route::post('products/add', 'Api\ProductController@addProduct')->name('products.addProduct');
    Route::put('products/edit/{product}', 'Api\ProductController@editProduct')->name('products.editProduct');
    Route::delete('products/delete/{product}', 'Api\ProductController@deleteProduct')->name('products.deleteProduct');

    //CHECKOUTS BUYERS
    Route::get('checkouts/me/list', 'Api\CheckoutController@getCheckouts')->name('checkouts.getCheckouts');
    Route::get('checkouts/me/view/{checkout}', 'Api\CheckoutController@getCheckout')->name('checkouts.getCheckout');
    Route::post('checkouts/me/new', 'Api\CheckoutController@addCheckout')->name('checkouts.addCheckout');
    //CHECKOUTS USER ADMIN
    Route::get('checkouts/list', 'Api\CheckoutController@getCheckoutsAll')->name('checkouts.getCheckoutsAll');
    Route::get('checkouts/view/{checkout}', 'Api\CheckoutController@getCheckoutBuyer')->name('checkouts.getCheckoutBuyer');
    Route::post('checkouts/new', 'Api\CheckoutController@addCheckoutBuyer')->name('checkouts.addCheckoutBuyer');
    Route::put('checkouts/edit/{checkout}', 'Api\CheckoutController@editCheckout')->name('checkouts.editCheckout');
    Route::delete('checkouts/delete/{checkout}', 'Api\CheckoutController@deleteCheckout')->name('checkouts.deleteCheckout');
});