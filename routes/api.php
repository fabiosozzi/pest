<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Actions\Product\ReturnProduct;
use App\Actions\Product\UpdateProduct;
use App\Actions\Category\ReturnCategory;
use App\Actions\Category\UpdateCategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::name('api.')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::middleware('auth:sanctum')->get('/', function (Request $request) {
            return $request->user();
        })->name('get');
    });

    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/{category}', ReturnCategory::class)->name('get');
        Route::post('/{category}/update', UpdateCategory::class)->name('update');
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/{product}', ReturnProduct::class)->name('get');
        Route::post('/{product}/update', UpdateProduct::class)->name('update');
    });
});
