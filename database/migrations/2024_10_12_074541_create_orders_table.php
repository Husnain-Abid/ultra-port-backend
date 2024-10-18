<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key referencing products
            $table->text('description')->nullable(); // Order description
            $table->decimal('amount', 10, 2); // Order amount
            $table->string('status'); // Order status (e.g., pending, completed, canceled)
            $table->string('customer'); // Customer name or ID
            $table->timestamps(); // Timestamps for created and updated
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
