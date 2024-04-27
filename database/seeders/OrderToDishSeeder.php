<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Order_to_dishes;
use Illuminate\Support\Facades\DB;

class OrderToDishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders_to_dishes')->truncate();
        Order_to_dishes::factory()->count(50)->create();

    }
}
