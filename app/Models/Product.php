<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    
    static $rules = [
		'nombre' => ['required' , 'string', 'unique:products,nombre'],
		'descripcion' => ['required', 'max:255'],
		'precio' => ['required', 'numeric'],
		'stock' => ['required', 'integer'],
		'total' => ['required', 'numeric'],
		'category_id' => ['required'],
		'brand_id' => ['required'],
    ];
    
    static $rule = [
		'nombre' => ['required', 'string'],
		'descripcion' => ['required', 'max:255'],
		'precio' => ['required', 'numeric'],
		'stock' => ['required', 'integer'],
		'total' => ['required', 'numeric'],
		'category_id' => ['required'],
		'brand_id' => ['required'],
    ];

    protected $perPage = 25;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','precio','stock','total','category_id','brand_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function brand()
    {
        return $this->hasOne('App\Models\Brand', 'id', 'brand_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function sales()
    {
        return $this->hasMany('App\Models\Sales', 'product_id', 'id');
    }
    

}
