<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Dishes;

class DishesSeeder extends Seeder
{

    public function run(): void
    {
        Dishes::factory()->count(50)->create();
    }
}
