<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->randomElement(['Galleta', 'Leche', 'PC', 'Celular', 'Detergente', 'Puerta', 'CPU']),
            'descripcion' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'precio' => $this->faker->randomfloat(2,20,4),
            'image' => $this->faker->imageUrl(),
            'stock' => $this->faker->randomDigit(8),
            'total' => $this->faker->randomfloat(2,20,4),
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }
}
