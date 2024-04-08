<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function humanTime()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function seller()
    {
        return $this->belongsTo(SellerDetail::class,'seller_detail_id');
    }
}
