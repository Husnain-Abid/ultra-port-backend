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
        Schema::create('graphics_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Nvidia GeForce RTX 3050
            $table->decimal('price', 8, 2); // Price of the graphics card
            $table->string('image')->nullable(); // Image URL of the graphics card
            $table->text('description')->nullable(); // Description of the graphics card
            $table->string('sku')->unique(); // SKU for the graphics card
            $table->string('category')->nullable(); // Category for the graphics card
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graphics_cards');
    }
};
