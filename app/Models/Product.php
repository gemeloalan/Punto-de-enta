<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class Product
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $stock
 * @property $total
 * @property $category_id
 * @property $brand_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Brand $brand
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    use SoftDeletes;
    
    static $rules = [
		'nombre' => ['required', 'string', 'unique:products,nombre'],
		'descripcion' => ['required', 'max:255'],
		'precio' => ['required', 'numeric'],
		'stock' => ['required', 'integer'],
		'total' => ['required', 'numeric'],
		'category_id' => ['required'],
		'brand_id' => ['required'],
    ];

    protected $perPage = 20;

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
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    

}
