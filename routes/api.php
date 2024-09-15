<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GambarProductController;
use App\Http\Controllers\API\KemejaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::resource('kemeja', KemejaController::class);
    Route::post('/kemeja/{id}', [KemejaController::class, 'update']);
    Route::resource('product-images', GambarProductController::class);
    Route::post('/product-images/{id}', [GambarProductController::class, 'update']);
});



    //Route::get('/listseller', [KemejaController::class, 'listSeller']);

