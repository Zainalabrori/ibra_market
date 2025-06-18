<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Sample products data - replace with your actual data source
        $products = [
            [
                'id' => 1,
                'name' => 'Laptop Dell XPS 13',
                'price' => 1299.99,
                'category' => 'Electronics',
                'stock' => 15,
                'description' => 'High-performance ultrabook with premium build quality.',
                'image' => asset('images/products/laptop_dell_xps_13.jpg')
            ],
            [
                'id' => 2,
                'name' => 'iPhone 15 Pro',
                'price' => 999.99,
                'category' => 'Electronics',
                'stock' => 25,
                'description' => 'Latest iPhone with advanced camera system.',
                'image' => asset('images/products/iphone_15_pro.jpg')
            ],
            [
                'id' => 3,
                'name' => 'Wireless Headphones',
                'price' => 199.99,
                'category' => 'Audio',
                'stock' => 50,
                'description' => 'Premium noise-cancelling wireless headphones.',
                'image' => asset('images/products/wireless_headphones.jpg')
            ]
        ];

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
