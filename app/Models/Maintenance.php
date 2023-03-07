<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $status
 */
class Maintenance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'maintenance';

    /**
     * @var array
     */
    protected $fillable = ['status'];
}
