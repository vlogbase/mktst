<?php

namespace App\Http\Livewire\Admin\Advertisement;

use App\Models\Advert;
use Livewire\Component;
use Livewire\WithPagination;

class AdsList extends Component
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
        $advert = Advert::find($postId);
        $advert->delete();
        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function refreshList()
    {
        $this->resetPage();
    }

    public function redirectItem($id)
    {
        redirect()->route('admin.contents.other.advertisement.edit', $id);
    }

    public function render()
    {
        $items = Advert::latest()->paginate(12);
        return view('livewire.admin.advertisement.ads-list', [
            'items' => $items
        ]);
    }
}
