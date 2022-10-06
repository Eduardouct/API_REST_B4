<?php


use App\Http\Controllers\Api\PROFESORESController;

use App\Http\Controllers\Api\RamosController;

use App\Http\Controllers\Api\EstudiantesController;

use App\Http\Controllers\Api\UsuariosController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\funcionCrud;

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
Route::post('/usuario', [funcionCrud::class, 'post']);
Route::get('/usuario', [funcionCrud::class, 'get']);
Route::get('/get/{tabla}', [funcionCrud::class, 'tablaSelec']);
Route::get('/usuario/{ID_Usuarios}', [funcionCrud::class, 'getbyid']);
Route::put('/usuario/put/{ID_Usuarios}', [funcionCrud::class, 'putbyid']);
Route::delete('/usuario/del/{ID_Usuarios}', [funcionCrud::class, 'deletebyid']);

Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('estudiantes', EstudiantesController::class);
Route::apiResource('ramos', RamosController::class);
Route::apiResource('pROFESORES', PROFESORESController::class);
