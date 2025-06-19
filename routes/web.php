<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'user') {
        return redirect()->route('user.dashboard');
    }

    abort(403);
})->name('dashboard');

//admin routes
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
});

//user routes
Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/user/dashboard',[UserController::class,'dashboard'])->name('user.dashboard');
});

// Product Routes - Resource Controller with Authentication
Route::resource('products', ProductController::class)->middleware(['auth']);

// Category Routes - Resource Controller with Authentication
Route::resource('categories', CategoryController::class)->middleware(['auth']);

// Additional category routes
    Route::patch('categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])
        ->name('categories.toggle-status');

    Route::get('api/categories', [CategoryController::class, 'api'])
        ->name('categories.api');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
