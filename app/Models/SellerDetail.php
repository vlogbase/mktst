<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
