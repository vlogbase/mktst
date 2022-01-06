<?php

namespace App\Models;

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
}
