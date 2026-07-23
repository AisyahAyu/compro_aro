<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'image',
        'name',
        'type',
        'dimensions',
        'specification',
        'brand_name',
        'sku',
        'country_of_origin',
        'has_variants',
        'variant_groups',
    ];

    protected $casts = [
        'has_variants' => 'boolean',
        'variant_groups' => 'array',
    ];

    /**
     * Get the variants for the product.
     */
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Accessor for brand name to fallback gracefully.
     */
    public function getResolvedBrandNameAttribute()
    {
        if ($this->brand) {
            return $this->brand->name;
        }

        return $this->brand_name ?? '-';
    }
}
