<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('Order_to_dishes', function (Blueprint $table) {
            $table->dropColumn('dish_id');

        });
        Schema::table('Order_to_dishes', function (Blueprint $table) {
            $table->json('dish_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Order_to_dishes', function (Blueprint $table) {
            $table->dropColumn('dish_id');
        });
        Schema::table('Order_to_dishes', function (Blueprint $table) {
            $table->foreignId('dish_id')->constrained('dishes');
        });
    }
};
