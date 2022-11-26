<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductSale
 *
 * @property $id
 * @property $sale_id
 * @property $product_id
 * @property $cantidad
 * @property $precio
 * @property $descuento
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Product $product
 * @property Sale $sale
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductSale extends Model
{
    use SoftDeletes;

    static $rules = [
		'cantidad' => 'required',
		'precio' => 'required',
		'descuento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['sale_id','product_id','cantidad','precio','descuento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sale()
    {
        return $this->hasOne('App\Models\Sale', 'id', 'sale_id');
    }
    

}
