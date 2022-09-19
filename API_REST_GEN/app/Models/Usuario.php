<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuarios';
    protected $primaryKey = 'ID_Usuarios';
    protected $fillable = ['correo', 'nickname', 'password'];
    public $timestamps = false;
}
