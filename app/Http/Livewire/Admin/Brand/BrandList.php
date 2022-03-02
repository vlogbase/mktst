<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'processDone' => 'eventOkay',
        'refreshList' => 'refreshList'
    ];

    public $search;

    public function updated($field)
    {
        if ($field == 'search') {
            $this->resetPage();
        }
    }

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        $brand = Brand::find($postId);

        if ($brand->products->count() > 0) {
            $this->emit('errorAlert', 'Brand has ' . $brand->products->count() . ' products!');
        } else {
            $brand->delete();
            $this->emit('succesAlert', 'Deleted!');
            $this->resetPage();
        }
    }

    public function refreshList()
    {
        $this->resetPage();
    }



    public function render()
    {
        $search_text = $this->search;
        $items = Brand::latest()->where(function ($query) use ($search_text) {
            if ($search_text) {
                $query->where('name', 'LIKE', '%' . $search_text . '%');
            }
        })->paginate(5);
        return view('livewire.admin.brand.brand-list', [
            'items' => $items,
        ]);
    }
}
