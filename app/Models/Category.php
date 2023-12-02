<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'parent_id', 'status'];

//    public function products() {
//        return $this->hasMany('App\Models\Product');
//    }
    public function products() {
        return $this->hasMany('App\Models\Product', 'category_id');
    }

    public function ParentCategory() {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
}
