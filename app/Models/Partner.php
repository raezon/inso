<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $phone_number
 * @property string $domaine
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class Partner extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'partner';

    /**
     * @var array
     */
    protected $fillable = ['name', 'surname', 'email', 'address', 'phone_number', 'domaine', 'message', 'created_at', 'updated_at'];
}
