<?php

namespace App\Http\Livewire\Admin\Feed;

use App\Models\Feed;
use Livewire\Component;
use Livewire\WithPagination;

class FeedList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'processDone' => 'eventOkay',
        'refreshList' => 'refreshList'
    ];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        $brand = Feed::find($postId);
        $brand->delete();
        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {
        $items = Feed::paginate(10);
        return view('livewire.admin.feed.feed-list', [
            'items' => $items,
        ]);
    }
}
