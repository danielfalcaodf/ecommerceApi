<?php

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
Route::post('auth/login', 'App\Http\Controllers\Api\AuthController@login')->name('auth.login');
Route::post('auth/register', 'App\Http\Controllers\Api\AuthController@register')->name('auth.register');
// PRODUCTS
Route::get('products/list', 'App\Http\Controllers\Api\ProductController@getProducts')->name('products.getProducts');
Route::get('products/view/{product}', 'App\Http\Controllers\Api\ProductController@getProduct')->name('products.getProduct');

// AUTH JWT
Route::group(['middleware' => ['apiJwt']], function () {
    //  AUTH USER
    Route::post('auth/logout', 'App\Http\Controllers\Api\AuthController@logout')->name('auth.logout');
    // USERS
    Route::get('users', 'App\Http\Controllers\Api\UserController@getListAll')->name('users.getListAll');
    Route::get('users/me', 'App\Http\Controllers\Api\UserController@getMe')->name('users.getMe');
    Route::put('users/me/edit/', 'App\Http\Controllers\Api\UserController@editNameEmail')->name('users.editNameEmail');

    //BUYERS
    Route::get('buyers/', 'App\Http\Controllers\Api\BuyerController@getBuyers')->name('buyers.getBuyers');
    Route::get('buyers/view/{buyer}', 'App\Http\Controllers\Api\BuyerController@getBuyer')->name('buyers.getBuyer');
    Route::post('buyers/add', 'App\Http\Controllers\Api\BuyerController@addBuyer')->name('buyers.addBuyer');
    Route::put('buyers/edit/{buyer}', 'App\Http\Controllers\Api\BuyerController@editBuyer')->name('buyers.editBuyer');
    Route::delete('buyers/delete/{buyer}', 'App\Http\Controllers\Api\BuyerController@deleteBuyer')->name('buyers.deleteBuyer');
    //PRODUCTS
    Route::post('products/add', 'App\Http\Controllers\Api\ProductController@addProduct')->name('products.addProduct');
    Route::put('products/edit/{product}', 'App\Http\Controllers\Api\ProductController@editProduct')->name('products.editProduct');
    Route::delete('products/delete/{product}', 'App\Http\Controllers\Api\ProductController@deleteProduct')->name('products.deleteProduct');

    //CHECKOUTS BUYERS
    Route::get('checkouts/me/list', 'App\Http\Controllers\Api\CheckoutController@getCheckouts')->name('checkouts.getCheckouts');
    Route::get('checkouts/me/view/{checkout}', 'App\Http\Controllers\Api\CheckoutController@getCheckout')->name('checkouts.getCheckout');
    Route::post('checkouts/me/new', 'App\Http\Controllers\Api\CheckoutController@addCheckout')->name('checkouts.addCheckout');
    //CHECKOUTS USER ADMIN
    Route::get('checkouts/list', 'App\Http\Controllers\Api\CheckoutController@getCheckoutsAll')->name('checkouts.getCheckoutsAll');
    Route::get('checkouts/view/{checkout}', 'App\Http\Controllers\Api\CheckoutController@getCheckoutBuyer')->name('checkouts.getCheckoutBuyer');
    Route::post('checkouts/new', 'App\Http\Controllers\Api\CheckoutController@addCheckoutBuyer')->name('checkouts.addCheckoutBuyer');
    Route::put('checkouts/edit/{checkout}', 'App\Http\Controllers\Api\CheckoutController@editCheckout')->name('checkouts.editCheckout');
    Route::delete('checkouts/delete/{checkout}', 'App\Http\Controllers\Api\CheckoutController@deleteCheckout')->name('checkouts.deleteCheckout');
});