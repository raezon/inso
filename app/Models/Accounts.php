<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property string $surname
 * @property string $age
 * @property string $gender
 * @property string $phone_number
 * @property string $birthdate
 * @property string $addresse
 * @property string $type
 * @property string $card_id
 * @property string $pourcent
 * @property string $couples
 * @property string $childrens
 * @property string $created_at
 * @property string $updated_at
 */
class Accounts extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['uuid', 'name', 'surname','age','gender', 'phone_number', 'birthdate', 'addresse', 'type', 'card_id', 'pourcent', 'childrens','couples', 'created_at', 'updated_at'];
}
