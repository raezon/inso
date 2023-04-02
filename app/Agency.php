<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $address
 * @property string $address_displayed
 * @property string $address_url
 * @property string $phone_number
 * @property string $latitude
 * @property string $longitude
 * @property string $wilaya
 * @property string $commune
 * @property string $created_at
 * @property string $updated_at
 */
class Agency extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'agency';

    /**
     * @var array
     */
    protected $fillable = ['id', 'name', 'image', 'address', 'address_displayed', 'address_url', 'phone_number', 'latitude', 'longitude', 'wilaya', 'commune', 'created_at', 'updated_at'];
}
