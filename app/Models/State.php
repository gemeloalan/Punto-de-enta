<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
  use SoftDeletes;
  use HasFactory;
    
    static $rules = [
		'nombre' => ['required', 'min:3', 'unique:states,nombre'],
    ];
    static $rule = [
		'nombre' => ['required', 'min:3'],
    ];

    protected $perPage = 1000;

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
