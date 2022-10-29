<?php

namespace App\Models;

use App\Adapter\Map;
use App\Services\Google\GoogleService;
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

    public static function factoryUpdate($hospital,$request,$image)
    {
        $hospital->name = $request->input('name');
        $hospital->phone_number = $request->input('phone_number');
        $hospital->address = $request->input('address');
        $hospital->speciality_id = $request->input('speciality_id');
        $hospital->addCordinates();
        $hospital->addImage($image);
        return $hospital;
    }
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
        return $this->belongsTo('App\Models\Speciality');
    }

    public function addCordinates(){
        $map = Map::make(GoogleService::class);

        $result= $map->calculateCordinates($this->address)->first(function ($value, $key) {
            return $value ;
        });
        $cordinates= $result->toArray();

        $this->latitude= $cordinates['latitude'];
        $this->longitude = $cordinates['longitude'];
    }

    public function addImage($image){
        $this->image=$image;
    }
}
