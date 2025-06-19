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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('category');
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->string('sku')->unique()->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();

            // Indexes for better performance
            $table->index(['category']);
            $table->index(['status']);
            $table->index(['stock']);
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
