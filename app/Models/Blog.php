<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Blog extends Model implements Feedable
{
    use HasFactory;
    protected $guarded = [];

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id(route('blogs.detail', $this->id))
            ->title($this->name)
            ->summary($this->name)
            ->updated($this->updated_at)
            ->image($this->image)
            ->link(route('blogs.detail', $this->slug))
            ->authorName('Markket');
    }

    public static function getAllFeedItems()
    {
        $blogs = Blog::all();
        $news = News::all();
        return $blogs->merge($news);
    }

    public function humanTime()
    {

        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getImageAttribute($value)
    {
        return '/' . $value;
    }
}
