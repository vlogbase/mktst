<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'redirect_url',
        'start_live_date',
        'end_live_date',
        'side',
    ];

    public function getImageUrl()
    {
        if ($this->image_url != '/') {
            $path = '/'.$this->image_url;
        } else {
            $path = '/upload/product/imageholderproduct.jpg';
        }

        return $path;
    }
}
