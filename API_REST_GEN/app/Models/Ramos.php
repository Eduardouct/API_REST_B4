<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $ID_Estudiantes
 * @property int $ID_Ramos
 * @property int $Semestre
 * @property string $asignatura
 * @property float $nota
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
}
