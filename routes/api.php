<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::prefix('products')->group(function () {
    //index
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    //store
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    //show
    Route::get('{id}', [ProductController::class, 'show'])->name('products.show');
    //update
    Route::post('update/{id}', [ProductController::class, 'update'])->name('products.update');
    //delete
    Route::delete('{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
