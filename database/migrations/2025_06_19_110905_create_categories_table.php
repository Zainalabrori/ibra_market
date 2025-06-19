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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Basic category information
            $table->string('name')->unique(); // Category name (unique)
            $table->string('slug')->unique(); // URL-friendly slug
            $table->text('description')->nullable(); // Category description

            // Visual customization
            $table->string('color', 7)->default('#6c757d'); // Hex color code
            $table->string('icon', 50)->default('fas fa-tag'); // Font Awesome icon class

            // Status and management
            $table->boolean('is_active')->default(true); // Active/inactive status

            // Timestamps
            $table->timestamps();

            // Indexes for better performance
            $table->index('is_active'); // For filtering active categories
            $table->index('name'); // For sorting by name
            $table->index('slug'); // For URL lookups
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
