<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImageAttribute($value)
    {
        return '/' . $value;
    }

    public function humanTime()
    {

        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
