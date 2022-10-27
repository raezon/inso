<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $speciality_id
 * @property string $name
 * @property string $image
 * @property string $address
 * @property string $phone_number
 * @property string $latitude
 * @property string $longitude
 * @property string $created_at
 * @property string $updated_at
 * @property Speciality $speciality
 */
class hospital extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hospital';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['speciality_id', 'name', 'image', 'address', 'phone_number', 'latitude', 'longitude', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality()
    {
        return $this->belongsTo('App\Speciality');
    }
}
