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
        Schema::table('operating_system', function (Blueprint $table) {
            $table->string('sku')->unique()->after('price'); // Add SKU column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('operating_systems', function (Blueprint $table) {
            $table->dropColumn('sku'); // Remove SKU column if needed
        });
    }
};
