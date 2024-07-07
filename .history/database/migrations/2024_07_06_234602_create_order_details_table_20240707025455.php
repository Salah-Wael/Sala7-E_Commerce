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
        Schema::create('order_details', function (Blueprint $table) {

            $table->id();

            $table->integer('quantity')->default(1);
            $table->decimal('price');
            
            $table->unsignedBigInteger('order_maker_id');
            $table->foreign('order_maker_id')->references('id')->on('users');

            $table->unsignedBigInteger('order_recipient_id');
            $table->foreign('order_recipient_id')->references('id')->on('order_recipients');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
