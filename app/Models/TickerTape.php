<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TickerTape extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tickerTapeCategory(){
        return $this->belongsTo(TickerTapeCategory::class,'category_id');
    }
}
