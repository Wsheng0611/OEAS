<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route; // Define Application Route (Default)


// use App\Http\Controllers\ProfileController;

/*
|
|--------------
| Web Routes
|--------------
| > use to define route that handle HTTP Request (load by RouteServiceProvider)
| > use 'get' 'put' 'post' 'delete' as functions
|
*/

// route (url , view)
Route::get('/',[ProductController::class, 'index']);
Route::get('/product_list/{id?}',[ProductController::class, 'view'])->name('product_list');
Route::get('/product_detail/{id}', [ProductController::class, 'show'])->name('product_detail');
Route::get('/my_cart', [CartController::class, 'view'])->middleware('auth')->name('cart');
Route::post('/add_cart', [CartController::class, 'add'])->middleware('auth')->name('add_cart');
Route::post('/update_cart', [CartController::class, 'update'])->middleware('auth')->name('update_cart');
Route::delete('/delete_cart/{id}',[CartController::class, 'delete'])->middleware('auth')->name('delete_cart');
Route::post('/checkout', [CartController::class, 'checkout'])->middleware('auth')->name('checkout');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


require __DIR__.'/auth.php';
