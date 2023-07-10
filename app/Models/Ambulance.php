<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $account_id
 * @property string $date_depart
 * @property string $date_arriver
 * @property string $num_cart
 * @property string $created_at
 * @property string $updated_at
 * @property Account $account
 */
class Ambulance extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ambulance';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['account_id', 'date_depart', 'date_arriver', 'num_cart', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
