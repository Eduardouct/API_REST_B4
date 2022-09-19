<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
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
    public function getbyid($ID_Usuarios)
    {
        $Usuarios = Usuario::find($ID_Usuarios);
        return response()->json($Usuarios);
    }
    public function putbyid(Request $request, $ID_Usuarios)
    {
        $Usuarios = Usuario::find($ID_Usuarios);

        $Usuarios->correo = $request->input('correo');
        $Usuarios->nickname = $request->input('nickname');
        $Usuarios->password = $request->input('password');

        $Usuarios->save();
        return response()->json($Usuarios);
    }
}
