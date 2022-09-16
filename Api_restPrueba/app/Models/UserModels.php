<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModels extends Model
{
    protected $table = 'Estudiantes';
    protected $fillable = ['Rut','Nombre','apellido_1','apellido_2','Fecha_Nacimiento','Direccion', 'Telefono', 'Correo', 'Carrera'];
    public $timestamps = false;
}
 