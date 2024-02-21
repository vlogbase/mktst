<?php

namespace App\Traits;

use App\Models\Feed;
use Carbon\Carbon;
use willvincent\Feeds\Facades\FeedsFacade;

trait FeedHelper
{

    public function createRssArray()
    {
      $allFeeds = Feed::all();
      $rssFeeds = [];
      foreach ($allFeeds as $feed) {
        $tempFeed = $this->parse($feed->url);
        array_push($rssFeeds, $tempFeed);
      }

      return $rssFeeds;
    }

    private function parse($feedUrl)
    {
        $feed = FeedsFacade::make($feedUrl);
        $items = $this->parseItem($feed->get_items(), $feed->get_title());

        $data = array(
          'title'     => $feed->get_title(),
          'permalink' => $feed->get_permalink(),
          'items'     => $items,
          'image'    => $feed->get_image_url(),
        );

        return $data;
    }

    private function parseItem($items, $name)
    {
        $tempArr = [];

        foreach ($items as $item) {
          $tempItem = array(
            'title' => $item->get_title(),
            'permalink' => $item->get_permalink(),
            'description' => $item->get_description(),
            'date' => $item->get_date('Y-m-d h:i:s'),
            'humanDate' => Carbon::parse($item->get_date('Y-m-d h:i:s'))->diffForHumans(),
            'image' => $item->get_enclosure()->link ?? '/upload/contents/rss-content.jpg',
            'name' => $name,
          );

          array_push($tempArr, $tempItem);
        }

        return $tempArr;
    }

   public function getRssFeedsCollection()
   {
      $rssFeeds = $this->createRssArray();
      return collect($rssFeeds);
   }

    public function getLatestRssFeed()
    {
      $rssFeeds = $this->createRssArray();
      $latestNews = [];
      foreach ($rssFeeds as $feed) {
        $latestNews = array_merge($latestNews, $feed['items']);
      }

      usort($latestNews, function($a, $b) {
        $carbonA = new Carbon($a['date']);
        $carbonB = new Carbon($b['date']);
        return $carbonA->diffInHours($carbonB);
      });

      return array_slice($latestNews, 0, 6);
        
    }

    public function getAllRssFeed()
    {
      $rssFeeds = $this->createRssArray();
      $latestNews = [];
      foreach ($rssFeeds as $feed) {
        $latestNews = array_merge($latestNews, $feed['items']);
      }

      usort($latestNews, function($a, $b) {
        $carbonA = new Carbon($a['date']);
        $carbonB = new Carbon($b['date']);
        return $carbonA->diffInHours($carbonB);
      });

      return $latestNews;
        
    }
    
}