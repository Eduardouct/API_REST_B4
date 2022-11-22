<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class procedimientos extends Controller
{
    public function MostrarP (){

        $consultaq = DB::select("SELECT name FROM sysobjects WHERE xtype = 'p'");
        $arreglo=[];
        array_push($arreglo,"parametros siguientes:http://127.0.0.1:8000/api/procedimientos/opcionP/opcionSU/Valor_A_Buscar");
        array_push($arreglo,"-------------------------------------");
        array_push($arreglo,"     PROCEDIMIENTOS ENCONTRADOS      ");
        array_push($arreglo,"-------------------------------------");
        for ($i=0; $i <count($consultaq) ; $i++) {
            $a=$consultaq[$i];
            $e=($a->name);
            array_push($arreglo,"opcionP ".$i.":");
            array_push($arreglo,$e);
        }
        array_push($arreglo,"-------------------------------------");
        array_push($arreglo,"|       tipo de procedimiento        |");
        array_push($arreglo,"|SELECT = 0 <--opcionSU--> UPDATE = 1|");
        array_push($arreglo,"-------------------------------------");
        array_push($arreglo,"|     consultas sobre cual usar      |");
        array_push($arreglo,"|     leer repositorio de GITHUB     |");
        array_push($arreglo,"-------------------------------------");

        return response() ->json($arreglo);
    }
    public function procedimiento($opcion,$seleccion,$id){
        $tran=intval($opcion);
        if($seleccion == 0){
            $consultaq = DB::select("SELECT name FROM sysobjects WHERE xtype = 'p'");
            $a=$consultaq[$opcion];
            $valor=($a->name);
            $consulta = DB::select("exec $valor '$id' ");
            return response() ->json($consulta);
        }
        elseif ($seleccion == 1) {
            $consultaq = DB::select("SELECT name FROM sysobjects WHERE xtype = 'p'");
            $a=$consultaq[$opcion];
            $valor=($a->name);
            $consulta = DB::update("exec $valor '$id' ");
            return response() ->json("cambios realizados exitosamente");
        }
        else{
            return response() ->json("valor ingresado no valido");
        }

    }
}

