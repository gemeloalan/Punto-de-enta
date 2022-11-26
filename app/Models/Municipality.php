<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Municipality
 *
 * @property $id
 * @property $nombre
 * @property $state_id
 * @property $created_at
 * @property $updated_at
 *
 * @property State $state
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipality extends Model
{
  use SoftDeletes;
  use HasFactory;

    
    static $rules = [
		'nombre' => 'required', 'unique:municipalities,nombre',
    
		'state_id' => 'required',
    ];
    static $rule = [
		'nombre' => 'required' ,
    
		'state_id' => 'required',
    ];

    protected $perPage = 1000;

   
    protected $fillable = ['nombre','state_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }
    public function customers()
    {
        return $this->hasMany('App\Models\Customer', 'municipality_id', 'id');
    }

    

}
