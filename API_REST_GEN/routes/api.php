<?php

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
Route::get('/usuario/{id}', [funcionCrud::class, 'getbyid']);
Route::put('/usuario/put/{id}', [funcionCrud::class, 'putbyid']);
Route::delete('/usuario/del/{id}', [funcionCrud::class, 'deletebyid']);