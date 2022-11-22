<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $key
 * @property string $role
 */
class api_Key extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'apikey';

    /**
     * @var array
     */
    protected $fillable = ['key', 'role'];
    public $timestamps = false;
}
