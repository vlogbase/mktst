<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function feeds()
    {
        return $this->hasMany(Feed::class);
    }
}
