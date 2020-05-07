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

Route::post('/login', 'ApiController@login');
Route::post('{type}/register', 'ApiController@register');

Route::get("email/verify/{token}", "ApiController@verify");


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
    Route::get("profile", "UserController@index");
    Route::put('profile/update', "UserController@update");
    Route::resource("reviews", "ReviewController");
    Route::post("products/new", "ProductController@newProduct");
    Route::post('products/add-to-cart', "ProductController@addToCard");

    Route::resource('carts', 'CartController');
});

Route::resource('products', 'ProductController');
Route::resource('categories', 'CategoryController');
Route::resource('orders', 'OrderController');

Route::get("category/{categoryId}", "ProductController@productByCategory");
