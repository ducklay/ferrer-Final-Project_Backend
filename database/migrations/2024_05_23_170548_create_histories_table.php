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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->string('mileage');
            $table->string('horsepower');
            $table->string('transmission');
            $table->string('price');
            $table->string('rent_from')->nullable();
            $table->string('rent_to')->nullable();
            $table->string('transaction');
            $table->timestamps();
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
