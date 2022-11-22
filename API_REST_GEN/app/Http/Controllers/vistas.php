<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vistas extends Controller
{
    public function MostrarV (){

        $consultaq = DB::select("SELECT name FROM sysobjects WHERE xtype = 'v'");
        $arreglo=[];
        array_push($arreglo,"parametros siguientes:http://127.0.0.1:8000/api/vistas/opcionv");
        array_push($arreglo,"-------------------------------------");
        array_push($arreglo,"          VISTAS ENCONTRADAS         ");
        array_push($arreglo,"-------------------------------------");
        for ($i=0; $i <count($consultaq) ; $i++) {
            $a=$consultaq[$i];
            $e=($a->name);
            array_push($arreglo,"opcionV ".$i.":");
            array_push($arreglo,$e);
        }
        return response() ->json($arreglo);
    }
    public function vista($opcion){
        $tran=intval($opcion);
        $consultaq = DB::select("SELECT name FROM sysobjects WHERE xtype = 'v'");
        $a=$consultaq[$opcion];
        $valor=($a->name);
        $consulta = DB::select("SELECT * from $valor ");
        return response() ->json($consulta);

    }
}

