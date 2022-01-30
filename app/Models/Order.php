<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderproducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function orderbilling()
    {
        return $this->hasOne(OrderBilling::class);
    }

    public function ordershipping()
    {
        return $this->hasOne(OrderShipping::class);
    }

    public function humanTime()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
