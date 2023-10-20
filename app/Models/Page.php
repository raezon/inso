<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $css
 * @property string $html
 */
class Page extends Model
{
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['css', 'html'];
}
