<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     use HasFactory;
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = [
        'category_name',
        'slug',
        'category_description',
        'category_image',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',
    ];

     public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
