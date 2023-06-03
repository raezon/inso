<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property integer $doctor_id
 * @property integer $accout_id
 * @property string $name_ordonance
 * @property string $pdf
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Account $account
 */
class Ordonance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ordonance';

    /**
     * @var array
     */
    protected $fillable = ['doctor_id', 'accout_id', 'name_ordonance', 'pdf', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'doctor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Account', 'accout_id');
    }
}
