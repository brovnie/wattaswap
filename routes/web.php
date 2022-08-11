<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;
use App\Models\Profile;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

/**
 *  Profile 
*/
Route::get('/profiles/{username}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profiles/{username}/create', [App\Http\Controllers\ProfilesController::class, 'create'])->name('profile.create');
Route::patch('/profiles/{username}/create', [App\Http\Controllers\ProfilesController::class, 'store'])->name('profile.store');


/**
 *  Product 
*/
Route::group(['middleware' => 'auth'], function() { 
    Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('product.create');
    Route::post('/products/create', [App\Http\Controllers\ProductsController::class, 'store'])->name('product.store');
    Route::get('/products/{product_id}/edit', [App\Http\Controllers\ProductsController::class, 'edit'])->name('product.edit');
    Route::patch('/products/{product_id}/edit', [App\Http\Controllers\ProductsController::class, 'update'])->name('product.update');    
});
Route::get('/products/search', [App\Http\Controllers\ProductsController::class, 'searchResults'])->name('product.searchResults');
Route::post('/products/search', [App\Http\Controllers\ProductsController::class, 'search'])->name('product.search');
Route::get('/products/{product_id}', [App\Http\Controllers\ProductsController::class, 'index'])->name('product.show');

/**
 *  Chat 
*/ 


/**
 *  Apis 
*/
Route::get('/api/v1/cities', [App\Http\Controllers\APIs\CitiesApiController::class, 'getCity']);
