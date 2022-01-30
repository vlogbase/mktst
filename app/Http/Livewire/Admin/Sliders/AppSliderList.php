<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\AppSlider;
use Livewire\Component;
use Livewire\WithPagination;

class AppSliderList extends Component
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
        AppSlider::find($postId)->delete();

        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {

        $items = AppSlider::latest()->paginate(12);

        return view('livewire.admin.sliders.app-slider-list', [
            'items' => $items,
        ]);
    }
}
