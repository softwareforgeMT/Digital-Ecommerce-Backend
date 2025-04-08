<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'detection_status', 'category_id', 'requirements',
        'supported_os', 'supported_platforms', 'features', 'stock', 'subplan_id', 'image', 'gallery', 'status'
    ];

    protected $casts = [
        'supported_os' => 'array',
        'requirements' => 'array',
        'supported_platforms' => 'array',
        'features' => 'array',
        'gallery' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }
    // You can define relationships here if needed, e.g., Category, Subscription, etc.
}
