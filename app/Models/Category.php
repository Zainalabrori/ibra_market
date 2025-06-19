<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'icon',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Boot the model and set up event listeners.
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate slug when creating a category
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        // Update slug when name changes
        static::updating(function ($category) {
            if ($category->isDirty('name')) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug'; // Use slug for route model binding
    }

    /**
     * Get all products that belong to this category.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include inactive categories.
     */
    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    /**
     * Scope a query to order categories by name.
     */
    public function scopeOrderByName($query, $direction = 'asc')
    {
        return $query->orderBy('name', $direction);
    }

    /**
     * Get the total value of all products in this category.
     */
    public function getTotalValueAttribute(): float
    {
        return $this->products()->sum('price');
    }

    /**
     * Get the total count of products in this category.
     */
    public function getProductsCountAttribute(): int
    {
        return $this->products()->count();
    }

    /**
     * Get the category color with fallback.
     */
    public function getColorAttribute($value): string
    {
        return $value ?: '#6c757d';
    }

    /**
     * Get the category icon with fallback.
     */
    public function getIconAttribute($value): string
    {
        return $value ?: 'fas fa-tag';
    }

    /**
     * Check if the category has any products.
     */
    public function hasProducts(): bool
    {
        return $this->products()->exists();
    }

    /**
     * Get active categories for API responses.
     */
    public static function getActiveForApi(): \Illuminate\Database\Eloquent\Collection
    {
        return static::active()
            ->select('id', 'name', 'slug', 'color', 'icon')
            ->orderByName()
            ->get();
    }
}
