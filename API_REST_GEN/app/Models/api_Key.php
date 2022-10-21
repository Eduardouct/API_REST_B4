<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $key
 * @property string $name
 */
class api_Key extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'apiKeyy';

    /**
     * @var array
     */
    protected $fillable = ['key', 'name'];
    public $timestamps = false;
}
