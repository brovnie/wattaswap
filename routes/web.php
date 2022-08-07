<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

/**
 *  Chat 
*/ 


/**
 *  Apis 
*/
Route::get('/api/v1/cities', [App\Http\Controllers\APIs\CitiesApiController::class, 'getCity']);