<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table ='Usuarios';
    protected $primaryKey = 'ID_usuario';
    protected $fillable=['correro','nickname','password'];
    #public $incrementing = false;
    public $timestamps = false;
}
