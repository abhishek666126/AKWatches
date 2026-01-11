<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'brand',
        'short_description',
        'description',
        'price',
        'discount_price',
        'stock',
        'gst_type',
        'variants',
        'images',
        'videos',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    protected $casts = [
        'variants' => 'array',
        'images' => 'array',
        'videos' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->price > 0 && $this->discount_price > 0) {
            return round((($this->price - $this->discount_price) / $this->price) * 100);
        }
        return 0;
    }

}
