<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $name
 * @property int $surname
 * @property int $email
 * @property string $password
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 */
class Comercial extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'comercial';

    /**
     * @var array
     */
    protected $fillable = ['name', 'surname', 'email', 'password', 'status', 'created_at', 'updated_at'];

    protected $hidden = [
        'password',
    ];
}
