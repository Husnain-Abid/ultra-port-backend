<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousingsTable extends Migration
{
    public function up()
    {
        Schema::create('housings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Gaming Tower Case
            $table->decimal('price', 8, 2); // Price of the housing
            $table->string('image')->nullable(); // Image URL of the housing
            $table->text('description')->nullable(); // Description of the housing
            $table->string('sku')->unique(); // SKU for the housing
            $table->string('category')->nullable(); // Category for the housing
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('housings');
    }
}

