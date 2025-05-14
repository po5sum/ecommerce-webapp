<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'category' => $this->faker->randomElement(['Tech', 'Gadget', 'Accessory']),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'stock_quantity' => $this->faker->numberBetween(1, 100),
            'image' => null,
        ];
    }
}
