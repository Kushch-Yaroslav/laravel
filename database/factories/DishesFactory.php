<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class DishesFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10,1000),
            'ingredients' => $this->faker->paragraph(),
        ];
    }
}
