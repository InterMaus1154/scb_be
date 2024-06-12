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
        Schema::create('kennels', function (Blueprint $table) {
            $table->increments('kennel_id')->unique();
            $table->unsignedInteger('kennel_type_id');
            $table->foreign('kennel_type_id')->references('kennel_type_id')->on('kennel_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kennels');
    }
};
