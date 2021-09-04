<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TwoFactorController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    
    Route::name('user.')->group(function () {
        Route::get('/products',[ProductController::class,'index'])->name('products');
    });

    Route::middleware(['isAdmin'])->name('admin.')->group(function () {
        Route::get('/products/create', [ProductController::class,'create'])->name('createProducts');
        Route::post('/product', [ProductController::class,'store'])->name('storeProduct');
        Route::get('/show/{id}', [ProductController::class,'show'])->name('showProduct');
        Route::post('/update/{id}', [ProductController::class,'update'])->name('updateProduct');
        Route::post('/destroy/{id}', [ProductController::class,'Delete'])->name('deleteProduct');
    });
    
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','twofactor','verified'])->name('dashboard');

require __DIR__.'/auth.php';
