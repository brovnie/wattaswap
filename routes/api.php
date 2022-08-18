<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Image;

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
//upload product images

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('upload', [App\Http\Controllers\ImagesController::class, 'store'])->name('upload');
Route::get('upload', [App\Http\Controllers\ImagesController::class, 'index'])->name('index');
Route::get('/media/{product_id}', [App\Http\Controllers\ImagesController::class, 'getImages'])->name('product.images');


