<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'seller';
    protected $fillable = [
        'name', 'email', 'password','is_master','phone','seller_detail_id', 'api_key', 'valid_till','is_autoextended'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sellerdetail()
    {
        return $this->belongsTo(SellerDetail::class, 'seller_detail_id');
    }

    public function products()
    {
        return [];
    }
}
