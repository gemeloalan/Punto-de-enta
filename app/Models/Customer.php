<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    use SoftDeletes;
    use HasFactory;

    static $rules = [
		'nombre' => 'required',
		'correo' => ['required', 'email', 'unique:customers,correo'],
		'telefono' => ['required' ,  'between:10,12', 'unique:customers,telefono' ],
		'direccion' => ['required', 'string', 'max:255'],
    ];
    static $rule = [
		'nombre' => 'required',
		'correo' => ['required', 'email'],
		'telefono' => ['required' ,  'between:10,12'],
		'direccion' => ['required', 'string', 'max:255'],
    ];

    protected $perPage = 1000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','correo','telefono','direccion','state_id', 'municipality_id', 'image'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }
    public function municipality()
    {
        return $this->hasOne('App\Models\Municipality', 'id', 'municipality_id');
    }
    

}
