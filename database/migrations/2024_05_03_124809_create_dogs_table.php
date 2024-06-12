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
        Schema::create('dogs', function (Blueprint $table) {
            $table->increments('dog_id')->unique();
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->string('caller_name', 50);
            $table->string('official_name', 100)->nullable();
            $table->string('breed', 50);
            $table->date('date_of_birth');
            $table->string('chip_number', 20);
            $table->string('vet_name', 75);
            $table->date('last_flea_treatment_date');
            $table->date('last_vaccination_date');
            $table->date('next_vaccination_date')->nullable();
            $table->date('next_flea_treatment_date')->nullable();
            $table->string('passport_number', 30)->nullable();
            $table->string('favourite_food', 120)->nullable();
            $table->string('emergency_phone_number', 20);
            $table->text('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
