<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property Hospital[] $hospitals
 */
class Speciality extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'speciality';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'image', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hospitals()
    {
        return $this->hasMany('App\Hospital');
    }
}
