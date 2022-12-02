<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sale
 *
 * @property $id
 * @property $customer_id
 * @property $product_id
 * @property $fecha
 * @property $total
 * @property $status
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Customer $customer
 * @property Product $product
 * @property ProductSale[] $productSales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sale extends Model
{
    use SoftDeletes, HasFactory;

    static $rules = [
		/* 'fecha' => 'required',
		'total' => 'required', */
		'status' => 'required',
    ];

    protected $perPage = 50;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id','product_id',/* 'fecha', */'cantidad', 'total'/* ,'status' */];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productSales()
    {
        return $this->hasMany('App\Models\ProductSale', 'sale_id', 'id');
    }
    

}
