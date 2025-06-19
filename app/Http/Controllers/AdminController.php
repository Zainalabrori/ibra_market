<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $newThisWeek = Product::where('created_at', '>=', now()->startOfWeek())->count();

        return view('admin.dashboard', compact('totalProducts', 'newThisWeek'));
    }
}
