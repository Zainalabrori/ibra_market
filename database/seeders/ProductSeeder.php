<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'MacBook Pro 16"',
                'description' => 'Apple MacBook Pro 16-inch with M3 Pro chip, 18GB memory, 512GB SSD storage.',
                'price' => 2499.00,
                'category' => 'Electronics',
                'stock' => 15,
                'sku' => 'PRD-MBPRO16M3',
                'status' => true,
            ],
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'Latest iPhone with titanium design, A17 Pro chip, and advanced camera system.',
                'price' => 1199.00,
                'category' => 'Electronics',
                'stock' => 25,
                'sku' => 'PRD-IP15PROMAX',
                'status' => true,
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Industry-leading noise canceling wireless headphones with crystal clear hands-free calling.',
                'price' => 399.99,
                'category' => 'Audio',
                'stock' => 50,
                'sku' => 'PRD-SONYWH1000',
                'status' => true,
            ],
            [
                'name' => 'Samsung 55" QLED TV',
                'description' => '55-inch QLED 4K Smart TV with Quantum Dot technology and HDR support.',
                'price' => 1299.99,
                'category' => 'Electronics',
                'stock' => 8,
                'sku' => 'PRD-SAM55QLED',
                'status' => true,
            ],
            [
                'name' => 'Nike Air Max 270',
                'description' => 'Nike Air Max 270 men\'s shoes with Max Air unit and comfortable cushioning.',
                'price' => 150.00,
                'category' => 'Footwear',
                'stock' => 35,
                'sku' => 'PRD-NIKEA270',
                'status' => true,
            ],
            [
                'name' => 'iPad Pro 12.9"',
                'description' => 'iPad Pro 12.9-inch with M2 chip, Liquid Retina XDR display, and Apple Pencil support.',
                'price' => 1099.00,
                'category' => 'Electronics',
                'stock' => 20,
                'sku' => 'PRD-IPADPRO129',
                'status' => true,
            ],
            [
                'name' => 'Adidas Ultraboost 22',
                'description' => 'Adidas Ultraboost 22 running shoes with responsive BOOST midsole.',
                'price' => 190.00,
                'category' => 'Footwear',
                'stock' => 28,
                'sku' => 'PRD-ADIUB22',
                'status' => true,
            ],
            [
                'name' => 'Dell XPS 13',
                'description' => 'Dell XPS 13 laptop with Intel Core i7, 16GB RAM, and 512GB SSD.',
                'price' => 1299.99,
                'category' => 'Electronics',
                'stock' => 12,
                'sku' => 'PRD-DELLXPS13',
                'status' => true,
            ],
            [
                'name' => 'AirPods Pro (2nd Gen)',
                'description' => 'Apple AirPods Pro with active noise cancellation and spatial audio.',
                'price' => 249.00,
                'category' => 'Audio',
                'stock' => 45,
                'sku' => 'PRD-APPRO2GEN',
                'status' => true,
            ],
            [
                'name' => 'PlayStation 5',
                'description' => 'Sony PlayStation 5 console with ultra-high speed SSD and ray tracing.',
                'price' => 499.99,
                'category' => 'Gaming',
                'stock' => 5,
                'sku' => 'PRD-PS5CONSOLE',
                'status' => true,
            ],
            [
                'name' => 'Kindle Oasis',
                'description' => 'Amazon Kindle Oasis e-reader with 7-inch display and adjustable warm light.',
                'price' => 279.99,
                'category' => 'Books',
                'stock' => 18,
                'sku' => 'PRD-KINDLEOASIS',
                'status' => true,
            ],
            [
                'name' => 'Google Nest Hub Max',
                'description' => 'Google Nest Hub Max smart display with Google Assistant and security camera.',
                'price' => 229.00,
                'category' => 'Smart Home',
                'stock' => 22,
                'sku' => 'PRD-GNESTHUBMAX',
                'status' => true,
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
