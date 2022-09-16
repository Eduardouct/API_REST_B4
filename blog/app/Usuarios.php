<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table ='Usuarios';
    protected $fillable=['correo','nickname','password'];
    protected $timeStap =  false;
}
