<?php


use App\Http\Controllers\Api\PROFESORESController;

use App\Http\Controllers\Api\RamosController;

use App\Http\Controllers\Api\EstudiantesController;

use App\Http\Controllers\Api\UsuariosController;
use App\Http\Controllers\apiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\funcionCrud;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["middleware" => "apikey.valid"], function () {

Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('estudiantes', EstudiantesController::class);
Route::apiResource('ramos', RamosController::class);
Route::apiResource('pROFESORES', PROFESORESController::class);

});
Route::group(["middleware" => "adminkey.valid"], function () {
Route::get('/keyGen/{name}', [apiKey::class, 'get']);
});