<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'sku', 'product_type', 'description', 'price', 
        'quantity', 'status', 'category_id', 'subcategory_id',
        'tags', 'checks', 'views', 'variations' ,'status' // Add variations here
    ];

    protected $casts = [
        'variations' => 'array',
        'tags' => 'array',
        'checks' => 'array',
        'gallery' => 'array'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    // public function scopeActive($query)
    // {
    //     return $query->where('products.status', 1); // Explicit table name
    // }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }



    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(ProductCategory::class, 'subcategory_id');
    }

    public function comments()
    {
        return $this->hasMany(ProductComment::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function approvedReviews()
    {
        return $this->reviews()->where('approved', true);
    }

    public function getAverageRatingAttribute()
    {
        return $this->approvedReviews()->avg('rating') ?: 0;
    }

    public function getRatingCountAttribute()
    {
        return $this->approvedReviews()->count();
    }

    // Add accessor methods for tags and checks
    public function getFormattedTagsAttribute()
    {
        if (empty($this->tags)) {
            return '';
        }
        $tags = is_string($this->tags) ? json_decode($this->tags, true) : $this->tags;
        return is_array($tags) ? implode(',', $tags) : '';
    }

    public function getFormattedChecksAttribute()
    {
        if (empty($this->checks)) {
            return [];
        }
        return is_string($this->checks) ? json_decode($this->checks, true) : $this->checks;
    }

    public function getFormattedVariationsAttribute()
    {
        if (empty($this->variations)) {
            return [];
        }
        return is_string($this->variations) ? json_decode($this->variations, true) : $this->variations;
    }

    public function hasVariations()
    {
        return !empty($this->formatted_variations);
    }
}
