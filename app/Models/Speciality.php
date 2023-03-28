<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $secondaryColor
 * @property string $icon
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
    protected $fillable = ['name', 'description', 'secondaryColor', 'icon', 'image', 'created_at', 'updated_at'];


    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_speciality', 'speciality_id', 'hospital_id');
    }
}
