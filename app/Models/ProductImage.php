<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "product_images";
    protected $fillable = [
        'image_path',
        'image_name',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
