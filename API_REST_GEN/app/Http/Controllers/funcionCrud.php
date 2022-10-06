<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PROFESORES;
use App\Models\Ramos;
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
    public function get2($tabla)
    {
        $tablaS = tablaSelec($tabla);
        return response()->json($tablaS);
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
    public function deletebyid(Request $request, $ID_Usuarios)
    {
        $Usuarios = Usuario::find($ID_Usuarios);
        $Usuarios->delete();

        return response()->json($Usuarios);
    }
    public function tablaSelec($tabla)
    {
        if($tabla == "Profesores"){
            $tabla = PROFESORES::all();
            return response()->json($tabla);
        }
        if($tabla == "Usuario"){
            $tabla = Usuario::all();
            return response()->json($tabla);
        }
        
    }
}

