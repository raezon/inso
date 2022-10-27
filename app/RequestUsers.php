<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property string $phone_number
 * @property string $card_id
 * @property string $created_at
 * @property string $updated_at
 */
class RequestUsers extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'request_user';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'surname', 'phone_number', 'card_id', 'created_at', 'updated_at'];
}
