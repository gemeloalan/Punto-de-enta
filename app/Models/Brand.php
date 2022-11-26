<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Brand extends Model
{
    
    static $rules = [
		'nombre' => ['required', 'min:3' ,'unique:brands,nombre'],
		'category_id' => 'required',
    ];
    static $rule = [
		'nombre' => ['required', 'min:3'],
		'category_id' => 'required',
    ];

    protected $perPage = 1000;

   
    protected $fillable = ['nombre','category_id'];
// protected $table = ['brans', 'products'];
use SoftDeletes;
use HasFactory;

 
    public function category()
    {
        // return $this->belongsTo('App\Models\Category', 'category_id', 'id');
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\
        Product', 'brand_id', 'id');
    }
    

}
