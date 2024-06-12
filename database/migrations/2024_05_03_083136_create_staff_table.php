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
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('staff_id')->unique();
            $table->string('employee_number', 8)->unique();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->date('date_of_birth');
            $table->string('email', 120)->unique();
            $table->string('phone_number', 20);
            $table->string('address_line_first', 75);
            $table->string('address_line_second', 75)->nullable();
            $table->string('city', 50);
            $table->string('postcode', 15);
            $table->string('county', 50)->nullable();
            $table->enum('gender', ['MALE', 'FEMALE', 'OTHER', 'NA']);
            $table->enum('role', ['MANAGER', 'GENERAL']);
            $table->string('password');
            $table->date('joined_at');
            $table->text('personal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
