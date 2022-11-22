<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class Query extends Controller
{
    function cantidad(){
        $nombres = [];
        $i = 0;
        $tables = DB::select("select table_name from apiRest.INFORMATION_SCHEMA.TABLES where TABLE_TYPE = 'BASE TABLE'");
        foreach ($tables as $post) {
            $nombres[$i] = $post->table_name;
            $i = $i+1;   
        }
        $c = count($nombres);
        return $c;
    }
    function nombres(){
        $nombres = [];
        $i = 0;
        $tables = DB::select("select table_name from apiRest.INFORMATION_SCHEMA.TABLES where TABLE_TYPE = 'BASE TABLE'");
        foreach ($tables as $post) {
            $nombres[$i] = $post->table_name;
            $i = $i+1;   
        }
        return $nombres;
    }
    function crear(){
        if (!Schema::hasTable('Apis')) {
            Schema::create('Apis', function($table){
                    $table->increments('ApiID');
                    $table->string('ApiTable', 50);
                    $table->string('ApiResource', 10);
                    $table->string('ApiUri', 100);
            });
        }
    }
}