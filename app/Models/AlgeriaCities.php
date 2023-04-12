<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $commune_name
 * @property string $commune_name_ascii
 * @property string $daira_name
 * @property string $daira_name_ascii
 * @property string $wilaya_code
 * @property string $wilaya_name
 * @property string $wilaya_name_ascii
 */
class AlgeriaCities extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['commune_name', 'commune_name_ascii', 'daira_name', 'daira_name_ascii', 'wilaya_code', 'wilaya_name', 'wilaya_name_ascii'];
}
