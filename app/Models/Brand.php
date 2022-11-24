<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 *
 * @property $id
 * @property $nombre
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Product[] $products
 * @package App
 * 
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
use Illuminate\Database\Eloquent\SoftDeletes;
class Brand extends Model
{
    
    static $rules = [
		'nombre' => ['required', 'min:3'],
		'category_id' => 'required',
    ];

    protected $perPage = 5;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','category_id'];
// protected $table = ['brans', 'products'];
use SoftDeletes;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
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
