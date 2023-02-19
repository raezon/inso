<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $account_id
 * @property string $childrens
 * @property string $couples
 * @property float $price
 * @property float $priceReduced
 * @property integer $doctor_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $patient_identity
 * @property Account $account
 */
class Appointement extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'appointement';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['account_id', 'childrens', 'couples', 'price', 'priceReduced', 'doctor_id', 'created_at', 'updated_at', 'patient_identity'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
