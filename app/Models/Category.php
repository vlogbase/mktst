<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function activeProducts()
    {
        return $this->belongsToMany(Product::class)->where('status', 1);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function getImageAttribute($value)
    {
        return '/' . $value;
    }

    public function getCoverImage()
    {
        if ($this->image != '/') {
            $path = $this->image;
        } else {
            $path = '/upload/product/imageholderproduct.jpg';
        }

        return $path;
    }

    public function humanTime()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
