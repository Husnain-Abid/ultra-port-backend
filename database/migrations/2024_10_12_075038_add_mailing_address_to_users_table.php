<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMailingAddressToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('street_address')->nullable(); // Street address
            $table->string('city')->nullable(); // City
            $table->string('state')->nullable(); // State
            $table->string('postal_code')->nullable(); // Postal code
            $table->string('country')->nullable(); // Country
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'street_address',
                'city',
                'state',
                'postal_code',
                'country',
            ]);
        });
    }
}
