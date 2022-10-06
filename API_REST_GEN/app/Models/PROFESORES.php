<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Profesor
 * @property int $ID_Usuarios
 * @property string $Nombre
 * @property string $apellido_1
 * @property string $apellido_2
 * @property int $Telefono
 * @property string $Correo
 * @property string $Asignatura
 */
class PROFESORES extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'PROFESORES';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Profesor';

    /**
     * @var array
     */
    protected $fillable = ['ID_Usuarios', 'Nombre', 'apellido_1', 'apellido_2', 'Telefono', 'Correo', 'Asignatura'];
}
