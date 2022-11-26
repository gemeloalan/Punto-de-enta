<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->date('y-m-d'),
            'status' => $this->faker->randomElement(['VALID', 'CANCELED']),
            'total' => $this->faker->randomfloat(2,20,4),
            'product_id' => Product::inRandomOrder()->first()->id,
            'customer_id' => Customer::inRandomOrder()->first()->id,
            /* 'brand_id' => Brand::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id, */
        ];
    }
}
