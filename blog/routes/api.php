<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Usuarios;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#Route::get('/usuarios','App\Http\Controllers\UsuarioController@index');
#Route::post('/usuarios','App\Http\Controllers\UsuarioController@store');
#Route::put('/usuarios/{id}','App\Http\Controllers\UsuarioController@update');
#Route::delete('/usuarios/{id}','App\Http\Controllers\UsuarioController@delete');

Route::post('/Usuarios', [UsuarioController::class,'store']);
Route::get('/Usuarios', [UsuarioController::class,'index']);
Route::delete('/Usuarios/{id}', [UsuarioController::class,'delete']);
Route::put('/Usuarios/put/{id}',[UsuarioController::class,'update']);
