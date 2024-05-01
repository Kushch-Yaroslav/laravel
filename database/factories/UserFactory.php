<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;
use App\Enums\Role;


class UserFactory extends Factory
{
protected $model = \App\Models\User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'role' => Role::cases()[array_rand(Role::cases())]->value,
            'email' => $this->faker->email(),
            'email_verified_at' =>$this->faker->dateTime(),
            'password' => $this->faker->password(),
        ];
    }

//    public function unverified(): static
//    {
//        return $this->state(fn (array $attributes) => [
//            'email_verified_at' => null,
//        ]);
//    }
}
