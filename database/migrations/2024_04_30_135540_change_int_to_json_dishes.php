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
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn('ingredients');

        });
        Schema::table('dishes', function (Blueprint $table) {
            $table->json('ingredients')->after('price');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn('ingredients');
        });
        Schema::table('dishes', function (Blueprint $table) {
            $table->string('ingredients')->after('price')->nullable(false);
        });
        }
};
