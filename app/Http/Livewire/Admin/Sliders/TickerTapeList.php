<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\TickerTape;
use Livewire\Component;
use Livewire\WithPagination;

class TickerTapeList extends Component
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
        TickerTape::find($postId)->delete();

        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {

        $items = TickerTape::latest()->paginate(12);

        return view('livewire.admin.sliders.ticker-tape-list', [
            'items' => $items,
        ]);
    }
}
