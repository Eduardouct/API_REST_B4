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

Route::post('/UserModels', [UserController::class,'post']);
Route::get('/UserModels', [UserController::class,'get']);
Route::get('/UserModels/{id}', [UserController::class,'getbyid']);
Route::put('/UserModels/put/{id}',[UserController::class,'putbyid']);

/* Route::post('/UserModels','App/Http/Controllers/UserController@create');
Route::get('/UserModels', 'App/Http/Controllers/UserController@get');
Route::get('/UserModels/{id}', 'App/Http/Controllers/UserController@getbyid');
Route::put('/UserModels/put/{id}', 'App/Http/Controllers/UserController@putbyid'); */