<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::group(['middleware'=>'auth:api'], function () {
    Route::apiResource('/currencies','CurrencyController');
    Route::apiResource('/type-status','TypeStatuController');
    Route::apiResource('/type-raw-materials','TypeRawMaterialController');
    Route::apiResource('/type-Products','TypeProductController');
    Route::apiResource('/status','StatuController');
    Route::apiResource('/roles','RoleController');
    Route::apiResource('/raw-materials','RawMaterialController');
    Route::apiResource('/providers','ProviderController');
    Route::apiResource('/product-materials','ProductMaterialController');
    Route::apiResource('/products','ProductController');
    Route::apiResource('/order-products','OrderProductController');
    Route::apiResource('/orders','OrderController');
    Route::apiResource('/deposit','DepositController');
    Route::apiResource('/clients','RoleController');
    Route::apiResource('/bills','BillController');
});
