<?php

namespace App\Http\Livewire\Admin\Feed;

use App\Models\Feed;
use App\Models\FeedCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AddFeed extends Component
{
    public $head;
    public $url;
    public $list;
    public $category;

    protected $listeners = [
        'refreshList' => 'refreshList'
    ];

    public function mount()
    {
        $this->getList();
    }

    public function refreshList()
    {
        $this->getList();
    }

    public function getList(){
        
        $this->list = FeedCategory::latest()->get();
        $this->category = $this->list->first()->id ?? null;
    }

    public function submit()
    {
        $data =  $this->validate([
            'head' => 'required|min:2|max:100|unique:feeds,head',
            'url' => 'required',
            'category' => 'nullable|exists:feed_categories,id',
        ]);

        $feed = new Feed();
        $feed->head = $this->head;
        $feed->slug = Str::slug($this->head);
        $feed->feed_category_id = $this->category;
        $feed->url = $this->url;
        $feed->save();

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }

    public function render()
    {
        return view('livewire.admin.feed.add-feed');
    }
}
