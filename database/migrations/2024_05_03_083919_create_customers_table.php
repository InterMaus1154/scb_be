<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id')->unique();
            $table->string('email', 120)->unique();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->string('phone_number', 20);
            $table->date('date_of_birth');
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER', 'NA']);
            $table->string('address_line_first', 75);
            $table->string('address_line_second', 75)->nullable();
            $table->string('city', 50);
            $table->string('postcode', 15);
            $table->string('county', 50)->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
