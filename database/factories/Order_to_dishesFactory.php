<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Order_to_dishesFactory extends Factory
{

    public function definition(): array
    {
        return [
            'dish_id' => $this->faker->numberBetween(1, 10),
            'order_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
