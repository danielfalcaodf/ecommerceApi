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
Route::post('auth/login', 'Api\AuthController@login');
Route::post('auth/register', 'Api\AuthController@register');

Route::get('products/list', 'Api\ProductController@getProducts')->name('products.getProducts');
Route::get('products/view/{product}', 'Api\ProductController@getProduct')->name('products.getProduct');

Route::group(['middleware' => ['apiJwt']], function () {

    Route::post('logout', 'Api\AuthController@logout');
    Route::post('refresh', 'Api\AuthController@refresh');
    Route::post('me', 'Api\AuthController@me');

    Route::get('users', 'Api\UserController@getListAll');

    Route::get('checkouts/me/list', 'Api\CheckoutController@getCheckouts')->name('checkouts.getCheckouts');
    Route::get('checkouts/me/view/{checkout}', 'Api\CheckoutController@getCheckout')->name('checkouts.getCheckout');
    Route::post('checkouts/me/new', 'Api\CheckoutController@addCheckout')->name('checkouts.addCheckout');
    // Route::put('checkouts/me/edit', 'Api\CheckoutController@editCheckout')->name('checkouts.editCheckout');
});