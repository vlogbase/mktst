<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\WebSlider;
use Livewire\Component;
use Livewire\WithPagination;

class WebSliderList extends Component
{
    use WithPagination;

    public $list;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['processDone' => 'eventOkay'];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function redirectItem($id)
    {
        return redirect()->route('admin.contents.sliders.web_edit', $id);
    }

    public function eventOkay($postId)
    {

        WebSlider::find($postId)->delete();


        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function render()
    {
        $items = WebSlider::latest()->paginate(12);
        return view('livewire.admin.sliders.web-slider-list', [
            'items' => $items,
        ]);
    }
}
