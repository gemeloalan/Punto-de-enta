<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class State
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipality[] $municipalities
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class State extends Model
{
  use SoftDeletes;
    
    static $rules = [
		'nombre' => ['required', 'min:3'],
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function municipalities()
    {
        return $this->hasMany('App\Models\Municipality', 'state_id', 'id');
    }
    public function customers()
    {
        return $this->hasMany('App\Models\Customer', 'state_id', 'id');
    }
    

}
