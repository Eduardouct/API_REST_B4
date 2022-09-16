<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModels;

class UserController extends Controller
{
    public function post(Request $request)
    {
        $usermodels = new UserModels();

        $usermodels->Rut = $request->input('Rut');
        $usermodels->Nombre = $request->input('Nombre');
        $usermodels->apellido_1 = $request->input('apellido_1');
        $usermodels->apellido_1 = $request->input('apellido_2');
        $usermodels->Fecha_Nacimiento = $request->input('Fecha_Nacimiento');
        $usermodels->Direccion = $request->input('Direccion');
        $usermodels->Telefono = $request->input('Telefono');
        $usermodels->Correo = $request->input('Correo');
        $usermodels->Carrera = $request->input('Carrera');

        $usermodels->save();
        return response()->json($usermodels);
    }

    public function get()
    {
        $usermodels = UserModels::all();
        return response()->json($usermodels);
    }

    public function getbyid($id)
    {
        $usermodels = UserModels::find($id);
        return response()->json($usermodels);
    }

    public function putbyid(Request $request, $id)
    {
        $usermodels = UserModels::find($id);

        $usermodels->Rut = $request->input('Rut');
        $usermodels->Nombre = $request->input('Nombre');
        $usermodels->apellido_1 = $request->input('apellido_1');
        $usermodels->apellido_1 = $request->input('apellido_2');
        $usermodels->Fecha_Nacimiento = $request->input('Fecha_Nacimiento');
        $usermodels->Direccion = $request->input('Direccion');
        $usermodels->Telefono = $request->input('Telefono');
        $usermodels->Correo = $request->input('Correo');
        $usermodels->Carrera = $request->input('Carrera');
        
        $usermodels->save();
        return response()->json($usermodels);
    }

}
