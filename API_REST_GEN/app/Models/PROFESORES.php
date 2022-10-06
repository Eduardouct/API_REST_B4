<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RUT_P
 * @property int $ID_Usuario
 * @property string $Nombre
 * @property string $Apellidos
 * @property int $Telefono
 * @property string $Asignatura
 * @property Usuario $usuario
 * @property Usuario $usuario
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
    protected $primaryKey = 'RUT_P';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['ID_Usuario', 'Nombre', 'Apellidos', 'Telefono', 'Asignatura'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'ID_Usuario', 'ID');
    }

}
