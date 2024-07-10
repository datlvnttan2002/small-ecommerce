<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Api\CategoryApiController;
use Modules\Product\Http\Controllers\Api\ProductApiController;
use Modules\Product\Http\Controllers\Api\ProductFlashSaleApiController;

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

// Route::middleware('auth:api')->get('/product', function (Request $request) {
//     return $request->user();
// });


Route::get('/product-flash-sale', [
    ProductFlashSaleApiController::class,
    'index'
])->name('api.product-flash-sale.index');

Route::group(['prefix'=>'category'],function(){
    Route::get('/', [
        CategoryApiController::class,
        'index'
    ])->where('tag', 'hot')->name('api.category.index');
});




Route::group(['prefix'=>'product'],function(){
    Route::get('/', [
        ProductApiController::class,
        'index'
    ])->where('tag', 'new|hot|sale')->name('api.product.index');
});