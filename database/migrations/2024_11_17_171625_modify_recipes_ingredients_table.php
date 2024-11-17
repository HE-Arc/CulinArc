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
        Schema::table('recipes_ingredients', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->primary(['recipe_id', 'ingredient_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes_ingredients', function (Blueprint $table) {
            $table->id();
            $table->dropPrimary(['recipe_id', 'ingredient_id']);
        });
    }
};