<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/usuario', [UserController::class, 'post']);
Route::get('/usuario', [UserController::class, 'get']);
Route::get('/usuario/{id}', [UserController::class, 'getbyid']);
Route::put('/usuario/put/{id}', [UserController::class, 'putbyid']);