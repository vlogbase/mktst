<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TickerTapeCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tickerTapes()
    {
        return $this->hasMany(TickerTape::class,'category_id');
    }
}
