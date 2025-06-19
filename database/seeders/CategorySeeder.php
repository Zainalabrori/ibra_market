<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::info('Starting Category seeder...');

        // Sample categories with realistic data
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Electronic devices, gadgets, and accessories including smartphones, laptops, and more.',
                'color' => '#007bff',
                'icon' => 'fas fa-laptop',
                'is_active' => true,
            ],
            [
                'name' => 'Clothing & Fashion',
                'description' => 'Trendy clothing, accessories, shoes, and fashion items for all ages.',
                'color' => '#e83e8c',
                'icon' => 'fas fa-tshirt',
                'is_active' => true,
            ],
            [
                'name' => 'Home & Garden',
                'description' => 'Home improvement items, furniture, gardening tools, and decor.',
                'color' => '#28a745',
                'icon' => 'fas fa-home',
                'is_active' => true,
            ],
            [
                'name' => 'Books & Media',
                'description' => 'Books, magazines, movies, music, and educational materials.',
                'color' => '#17a2b8',
                'icon' => 'fas fa-book',
                'is_active' => true,
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Sports equipment, outdoor gear, fitness accessories, and athletic wear.',
                'color' => '#fd7e14',
                'icon' => 'fas fa-dumbbell',
                'is_active' => true,
            ],
            [
                'name' => 'Health & Beauty',
                'description' => 'Health products, cosmetics, skincare, and personal care items.',
                'color' => '#20c997',
                'icon' => 'fas fa-heart',
                'is_active' => true,
            ],
            [
                'name' => 'Automotive',
                'description' => 'Car parts, accessories, tools, and automotive maintenance products.',
                'color' => '#6f42c1',
                'icon' => 'fas fa-car',
                'is_active' => true,
            ],
            [
                'name' => 'Food & Beverages',
                'description' => 'Gourmet foods, beverages, snacks, and specialty ingredients.',
                'color' => '#dc3545',
                'icon' => 'fas fa-utensils',
                'is_active' => true,
            ],
            [
                'name' => 'Toys & Games',
                'description' => 'Toys for children, board games, puzzles, and entertainment products.',
                'color' => '#ffc107',
                'icon' => 'fas fa-gamepad',
                'is_active' => true,
            ],
            [
                'name' => 'Office Supplies',
                'description' => 'Stationery, office equipment, desk accessories, and business supplies.',
                'color' => '#6c757d',
                'icon' => 'fas fa-briefcase',
                'is_active' => true,
            ],
            [
                'name' => 'Pet Supplies',
                'description' => 'Pet food, toys, accessories, and care products for all types of pets.',
                'color' => '#8b5a3c',
                'icon' => 'fas fa-paw',
                'is_active' => true,
            ],
            [
                'name' => 'Jewelry & Accessories',
                'description' => 'Fine jewelry, watches, accessories, and luxury items.',
                'color' => '#f8d7da',
                'icon' => 'fas fa-gem',
                'is_active' => false, // Inactive category for testing
            ],
        ];

        // Log the number of categories to be created
        Log::info('Creating ' . count($categories) . ' categories...');

        foreach ($categories as $categoryData) {
            try {
                // Create category using the model
                $category = Category::create($categoryData);

                Log::info("Created category: {$category->name} (ID: {$category->id}, Slug: {$category->slug})");

            } catch (\Exception $e) {
                Log::error("Failed to create category '{$categoryData['name']}': " . $e->getMessage());
            }
        }

        // Log completion statistics
        $totalCategories = Category::count();
        $activeCategories = Category::where('is_active', true)->count();
        $inactiveCategories = Category::where('is_active', false)->count();

        Log::info("Category seeding completed!");
        Log::info("Total categories created: {$totalCategories}");
        Log::info("Active categories: {$activeCategories}");
        Log::info("Inactive categories: {$inactiveCategories}");

        // Display console output as well
        $this->command->info("✅ Successfully created {$totalCategories} categories");
        $this->command->info("   - Active: {$activeCategories}");
        $this->command->info("   - Inactive: {$inactiveCategories}");
    }
}
