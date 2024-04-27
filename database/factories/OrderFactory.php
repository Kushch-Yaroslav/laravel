<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,10),
            'status'=>$this->faker->boolean(),
            'payment_method'=>$this->faker->word(),
            'total_price'=>$this->faker->randomFloat(2,0,1000),
        ];
    }
}
