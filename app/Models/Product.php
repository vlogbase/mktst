<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productdetail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function productinfos()
    {
        return $this->hasMany(ProductInfo::class);
    }

    public function productimages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
