<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSale>
 */
class ProductSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'sale_id' => Sale::inRandomOrder()->first()->id,
        'product_id' => Product::inRandomOrder()->first()->id,
        'cantidad' => $this->faker->randomDigit(),
        'precio' => $this->faker->randomDigit(),
        'cantidad' => $this->faker->randomDigit(),
        'descuento' => $this->faker->randomDigit(),


        ];
    }
}
