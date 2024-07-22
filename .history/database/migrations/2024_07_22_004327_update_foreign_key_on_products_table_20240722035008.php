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
        Schema::table('products', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['category_name']);

            // Add the new foreign key constraint with ON UPDATE CASCADE
            $table->foreign('category_name')
                    ->references('name')
                    ->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete(''set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the updated foreign key constraint
            $table->dropForeign(['category_name']);

            // Revert to the original foreign key constraint
            $table->foreign('category_name')
            ->references('name')
            ->on('categories');
        });
    }
};
