<?php

namespace Database\Factories;

use App\Models\Municipality;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'correo' =>$this->faker->companyEmail(), 
            'telefono' =>$this->faker->e164PhoneNumber(),
            'direccion' =>$this->faker->address(),
            'image' => $this->faker->imageUrl(),

            'state_id'=>State::inRandomOrder()->first()->id,
            'municipality_id'=>Municipality::inRandomOrder()->first()->id,

               ];
    }
}
