<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $students = new Student();

        $students->nombre = $request->input('nombre');
        $students->apellido = $request->input('apellido');

        $students->save();
        return response()->json($students);
    }
}
