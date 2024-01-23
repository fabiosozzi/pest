<?php

use App\Actions\ReturnCategory;
use App\Actions\ReturnProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    });

    Route::prefix('product')->name('product.')->group(function () {
        Route::get('/{product}', ReturnProduct::class)->name('get');
    });
});
