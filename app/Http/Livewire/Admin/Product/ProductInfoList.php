<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductInfo;
use Livewire\Component;
use Livewire\WithPagination;

class ProductInfoList extends Component
{
    public $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'processDone' => 'eventOkay',
        'refreshList' => 'refreshList'
    ];

    public function mount($itemid)
    {
        $this->itemid = $itemid;
    }

    public function render()
    {
        $search_text = $this->search;
        $items = ProductInfo::where('product_id', $this->itemid)->latest()->where(function ($query) use ($search_text) {
            if ($search_text) {
                $query->where('key', 'LIKE', '%' . $search_text . '%')
                    ->orWhere('value', 'LIKE', '%' . $search_text . '%');
            }
        })->paginate(5, ['*'], 'infosPage');
        return view('livewire.admin.product.product-info-list', [
            'items' => $items,
        ]);
    }

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        ProductInfo::find($postId)->delete();
        $this->emit('succesAlert', 'Deleted!');
        $this->resetPage();
    }

    public function refreshList()
    {
        $this->resetPage();
    }
}
