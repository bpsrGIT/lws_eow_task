<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => 'aaaaaaa',
            'price' => '1234545463',
            'quantity' => $this->faker->numberBetween(1, 10),
            'isActive' => 'false',
        ];
    }
}
