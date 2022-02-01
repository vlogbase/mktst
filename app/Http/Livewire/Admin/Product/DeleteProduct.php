<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class DeleteProduct extends Component
{
    public $itemid;

    protected $listeners = ['processDone' => 'eventOkay'];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        Product::find($postId)->delete();
        $this->emit('succesAlert', 'Deleted!');
        return redirect()->route('admin.products.list');
    }
    public function render()
    {
        return view('livewire.admin.product.delete-product');
    }
}
