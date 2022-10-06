<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_Estudiantes
 * @property int $ID_Ramos
 * @property int $Semestre
 * @property string $asignatura
 * @property float $nota
 * @property Estudiante $estudiante
 * @property Estudiante $estudiante
 */
class Ramos extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'Ramos';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_Ramos';

    /**
     * @var array
     */
    protected $fillable = ['ID_Estudiantes', 'Semestre', 'asignatura', 'nota'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'ID_Estudiantes', 'RUT_E');
    }

}
