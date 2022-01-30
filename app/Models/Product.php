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

    public function getCoverImage()
    {
        if ($this->productimages->count() > 0) {
            $path = $this->productimages->first()->path;
        } else {
            $path = '/upload/product/imageholderproduct.jpg';
        }

        return $path;
    }

    public function showPrice()
    {
        return number_format($this->unit_price - $this->discount, 2);
    }

    public function calcStock()
    {
        return intval($this->stock / $this->per_unit);
    }
}
