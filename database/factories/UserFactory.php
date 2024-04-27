<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



class UserFactory extends Factory
{
protected $model = \App\Models\User::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->email(),
            'password' => fake()->password(),
        ];
    }

//    public function unverified(): static
//    {
//        return $this->state(fn (array $attributes) => [
//            'email_verified_at' => null,
//        ]);
//    }
}
