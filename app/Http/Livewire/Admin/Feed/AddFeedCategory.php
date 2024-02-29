<?php

namespace App\Http\Livewire\Admin\Feed;

use App\Models\FeedCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class AddFeedCategory extends Component
{
    public $name;
    public $list;

    public function mount()
    {
        $this->getList();
    }

    public function submit()
    {
        $data =  $this->validate([
            'name' => 'required|min:2|max:100|unique:feed_categories,name',
        ]);

        $feed = new FeedCategory();
        $feed->name = $this->name;
        $feed->slug = Str::slug($this->name);
        $feed->save();

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');

        $this->reset();
        $this->getList();

    }

    public function deleteItem($id)
    {
        $brand = FeedCategory::find($id);
        $brand->delete();
        $this->emit('succesAlert', 'Deleted!');
        $this->reset();
        $this->getList();
    }

    

    public function getList(){
        $this->list = FeedCategory::latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.feed.add-feed-category', [
            'items' =>$this->list,
        ]);
    }
}
