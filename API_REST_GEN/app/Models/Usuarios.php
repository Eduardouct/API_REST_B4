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
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Usuarios';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * @var array
     */
    protected $fillable = ['correo', 'nickname', 'password'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estudiantes()
    {
        return $this->hasMany('App\Estudiante', 'ID_Usuario', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pROFESOREs()
    {
        return $this->hasMany('App\PROFESORE', 'ID_Usuario', 'ID');
    }

}
