<?php

namespace App\Http\Livewire\Admin\Contents;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class GalleryList extends Component
{
    use WithPagination;
    public $list;
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
        Gallery::find($postId)->delete();

        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {

        $items = Gallery::latest()->paginate(12);

        return view('livewire.admin.contents.gallery-list', [
            'items' => $items,
        ]);
    }
}
