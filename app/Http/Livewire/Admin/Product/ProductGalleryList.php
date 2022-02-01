<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithPagination;

class ProductGalleryList extends Component
{
    use WithPagination;
    public $list;
    public $itemid;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'processDone' => 'eventOkay',
        'refreshList' => 'refreshList'
    ];

    public function mount($itemid)
    {
        $this->itemid = $itemid;
    }

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        ProductImage::find($postId)->delete();
        $this->emit('succesAlert', 'Deleted!');
    }

    public function refreshList()
    {
        $this->resetPage();
    }


    public function render()
    {
        $items = ProductImage::where('product_id', $this->itemid)->latest()->paginate(6, ['*'], 'infosPage');
        return view('livewire.admin.product.product-gallery-list', [
            'items' => $items,
        ]);
    }
}
