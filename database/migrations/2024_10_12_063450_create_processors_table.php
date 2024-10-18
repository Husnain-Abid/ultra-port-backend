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
        Schema::create('processors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., AMD Ryzen 5 4500
            $table->decimal('price', 8, 2); // Price of the processor
            $table->string('image')->nullable(); // Image URL of the processor
            $table->text('description')->nullable(); // Description of the processor
            $table->string('sku')->unique(); // SKU for the processor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processors');
    }
};
