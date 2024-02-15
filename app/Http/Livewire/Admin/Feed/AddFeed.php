<?php

namespace App\Http\Livewire\Admin\Feed;

use App\Models\Feed;
use Livewire\Component;
use Illuminate\Support\Str;

class AddFeed extends Component
{
    public $head;
    public $url;

    public function submit()
    {
        $data =  $this->validate([
            'head' => 'required|min:2|max:100|unique:feeds,head',
            'url' => 'required',
        ]);

        $feed = new Feed();
        $feed->head = $this->head;
        $feed->slug = Str::slug($this->head);
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
