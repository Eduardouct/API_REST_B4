<?php

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vistas;
use App\Http\Controllers\procedimientos;
Route::get("/procedimientos",[procedimientos::class,"MostrarP"]);
Route::get("/procedimientos/{opcion}/{seleccion}/{id}",[procedimientos::class,"procedimiento"]);
Route::get("/vistas",[vistas::class,"MostrarV"]);
Route::get("/vistas/{opcion}",[vistas::class,"vista"]);

#inde
