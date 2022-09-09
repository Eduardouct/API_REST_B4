<?php

namespace App\Models;
//CREADO CON php artisan make:model Student
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
   protected $table = 'students';
   protected $fillable = ['nombre', 'apellido'];
}
