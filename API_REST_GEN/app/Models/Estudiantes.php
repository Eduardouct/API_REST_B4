<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RUT_E
 * @property int $ID_Usuario
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Fecha_Nacimiento
 * @property string $Direccion
 * @property int $Telefono
 * @property string $Carrera
 * @property Usuario $usuario
 * @property Usuario $usuario
 * @property Ramo[] $ramos
 * @property Ramo[] $ramos
 */
class Estudiantes extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Estudiantes';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'RUT_E';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['ID_Usuario', 'Nombre', 'Apellidos', 'Fecha_Nacimiento', 'Direccion', 'Telefono', 'Carrera'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'ID_Usuario', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ramos()
    {
        return $this->hasMany('App\Ramo', 'ID_Estudiantes', 'RUT_E');
    }

}
