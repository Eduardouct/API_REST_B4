<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class funcionCrud extends Controller
{
    public function post(Request $request)
    {
        $Usuarios = new Usuario();

        $Usuarios->correo = $request->input('correo');
        $Usuarios->nickname = $request->input('nickname');
        $Usuarios->password = $request->input('password');

        $Usuarios->save();
        return response()->json($Usuarios);
    }
    public function get()
    {
        $Usuarios = Usuario::all();
        return response()->json($Usuarios);
    }
    public function getbyid($id)
    {
        $Usuarios = Usuario::find($id);
        return response()->json($Usuarios);
    }
    public function putbyid(Request $request, $id)
    {
        $Usuarios = Usuario::find($id);

        $Usuarios->correo = $request->input('correo');
        $Usuarios->nickname = $request->input('nickname');
        $Usuarios->password = $request->input('password');

        $Usuarios->save();
        return response()->json($Usuarios);
    }
    public function deletebyid(Request $request, $id)
    {
        $Usuarios = Usuario::find($id);
        $Usuarios->delete();

        return response()->json($Usuarios);
    }
}

