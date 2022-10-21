<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID
 * @property string $correo
 * @property string $nickname
 * @property string $password
 * @property Estudiante[] $estudiantes
 * @property Estudiante[] $estudiantes
 * @property PROFESORE[] $pROFESOREs
 * @property PROFESORE[] $pROFESOREs
 */
class Usuarios extends Model
{

    protected $table = 'Usuarios';
    protected $primaryKey = 'ID';
    protected $fillable = ['correo', 'nickname', 'password'];

    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante', 'ID_Usuario', 'ID');
    }

    public function pROFESOREs()
    {
        return $this->hasMany('App\PROFESORE', 'ID_Usuario', 'ID');
    }

}
