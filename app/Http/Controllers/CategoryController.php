<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->paginate(12);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean'
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);

        // Set default values
        $validated['is_active'] = $request->has('is_active');
        $validated['color'] = $validated['color'] ?? '#6c757d';
        $validated['icon'] = $validated['icon'] ?? 'fas fa-tag';

        Category::create($validated);

        return redirect()->route('categories.index')
            ->with('success', __('Category created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category->load(['products' => function ($query) {
            $query->latest()->take(6);
        }]);

        $totalProducts = $category->products()->count();
        $totalValue = $category->products()->sum('price');

        return view('categories.show', compact('category', 'totalProducts', 'totalValue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:1000',
            'color' => 'nullable|string|max:7',
            'icon' => 'nullable|string|max:50',
            'is_active' => 'boolean'
        ]);

        // Update slug if name changed
        if ($category->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Set default values
        $validated['is_active'] = $request->has('is_active');
        $validated['color'] = $validated['color'] ?? '#6c757d';
        $validated['icon'] = $validated['icon'] ?? 'fas fa-tag';

        $category->update($validated);

        return redirect()->route('categories.show', $category)
            ->with('success', __('Category updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Check if category has products
        if ($category->products()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', __('Cannot delete category that contains products.'));
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', __('Category deleted successfully.'));
    }

    /**
     * Toggle category status
     */
    public function toggleStatus(Category $category)
    {
        $category->update([
            'is_active' => !$category->is_active
        ]);

        $status = $category->is_active ? 'activated' : 'deactivated';

        return redirect()->back()
            ->with('success', __('Category ' . $status . ' successfully.'));
    }

    /**
     * Get categories for API or AJAX requests
     */
    public function api()
    {
        $categories = Category::where('is_active', true)
            ->select('id', 'name', 'slug', 'color', 'icon')
            ->orderBy('name')
            ->get();

        return response()->json($categories);
    }
}
