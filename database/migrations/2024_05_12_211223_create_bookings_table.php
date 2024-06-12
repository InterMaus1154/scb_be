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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('booking_id')->unique();
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->unsignedInteger('dog_id');
            $table->foreign('dog_id')->references('dog_id')->on('dogs');
            $table->unsignedInteger('food_type_id')->default('1');
            $table->foreign('food_type_id')->references('food_type_id')->on('food_types');
            //this field is only required, if the food type is special
            $table->string('food_type_special')->nullable();
            //requested type from customer
            $table->unsignedInteger('kennel_type_id');
            $table->foreign('kennel_type_id')->references('kennel_type_id')->on('kennel_types');
            $table->date('booking_start_date');
            $table->date('booking_end_date');
            $table->enum('status', ['CLOSED', 'OPEN'])->default('OPEN');
            //amount of a dog being fed a day
            $table->enum('feeding_freq', ['1', '2', '3', '4', 'SPECIAL'])->default('2');
            $table->text('special_feeding')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
