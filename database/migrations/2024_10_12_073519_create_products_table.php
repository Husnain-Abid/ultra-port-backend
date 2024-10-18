<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('sku')->nullable();

            $table->decimal('old_price', 8, 2)->nullable(); // Add this line
            $table->integer('delivery_time')->nullable(); // Add this line
            $table->json('images')->nullable(); // Add this line

            // Foreign keys for each category
            $table->foreignId('ram_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('cooler_aios_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('ssd_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('hard_disk_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('reader_writer_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('foods_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('case_fan_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('sound_card_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('wi_fi_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('mouse_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('screen_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('accessory_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('software_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('operating_systems_id')->nullable()->constrained()->onDelete('set null'); // New foreign key
            $table->foreignId('processors_id')->nullable()->constrained()->onDelete('set null'); // New foreign key
            $table->foreignId('motherboard_id')->nullable()->constrained()->onDelete('set null'); // New foreign key
            $table->foreignId('graphics_card_id')->nullable()->constrained()->onDelete('set null'); // New foreign key
            $table->foreignId('housings_id')->nullable()->constrained()->onDelete('set null'); // New foreign key

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('products');

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['old_price', 'delivery_time', 'images']);
        });
    

    }
}
