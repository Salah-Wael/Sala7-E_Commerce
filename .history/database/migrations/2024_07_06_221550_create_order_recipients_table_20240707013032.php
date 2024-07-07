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
        Schema::create('order_recipients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->text('comment')->nullable();
            $table->string('country');
            $table->foreign('country')->references('name')->on('countries');
            $table->string('city');
            $table->foreign('country')->references('name')->on('cities');
            $table->unsignedBigInteger('order_maker');
            $table->foreign('order_maker')->references('id')->on('users');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_recipients');
    }
};
