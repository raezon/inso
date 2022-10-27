<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $about_us
 * @property string $logo
 * @property string $created_at
 * @property string $updated_at
 */
class Settings extends Model
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
    protected $fillable = ['about_us', 'logo', 'created_at', 'updated_at'];
}
