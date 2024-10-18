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
        Schema::create('motherboards', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., MSI A520M-A Pro
            $table->decimal('price', 8, 2); // Price of the motherboard
            $table->string('image')->nullable(); // Image URL of the motherboard
            $table->text('description')->nullable(); // Description of the motherboard
            $table->string('sku')->unique(); // SKU for the motherboard
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motherboards');
    }
};
