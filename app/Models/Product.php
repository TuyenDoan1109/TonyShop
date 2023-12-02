<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'brand_id',
        'admin_id',
        'content',
        'feature_image_name',
        'feature_image_path',
        'status'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function product_reviews() {
        return $this->hasMany('App\Models\ProductReview');
    }

    public function rams() {
        return $this->belongsToMany('App\Models\Ram', 'product_ram_color');
//            ->withPivot('extra_feature')
//            ->withTimestamps();
    }

    public function colors() {
        return $this->belongsToMany('App\Models\Color', 'product_ram_color');
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags')->withTimestamps();
    }
}
