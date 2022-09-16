<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class UserController extends Controller
{
    public function post(Request $request)
    {
        $Usuarios = new Student();

        $Usuarios->correo = $request->input('correo');
        $Usuarios->nickname = $request->input('nickname');
        $Usuarios->password = $request->input('password');

        $Usuarios->save();
        return response()->json($Usuarios);
    }
    public function get()
    {
        $Usuarios = Student::all();
        return response()->json($Usuarios);
    }
    public function getbyid($id)
    {
        $Usuarios = Student::find($id);
        return response()->json($Usuarios);
    }
    public function putbyid(Request $request, $id)
    {
        $Usuarios = Student::find($id);

        $Usuarios->correo = $request->input('correo');
        $Usuarios->nickname = $request->input('nickname');
        $Usuarios->password = $request->input('password');

        $Usuarios->save();
        return response()->json($Usuarios);
    }
}
