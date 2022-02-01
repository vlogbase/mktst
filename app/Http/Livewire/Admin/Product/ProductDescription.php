<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductDetail;
use Livewire\Component;

class ProductDescription extends Component
{
    public $description_text;
    public $item;
    public $itemid;

    public function mount($itemid)
    {
        $this->item = ProductDetail::where('product_id', $itemid)->first();
        $this->itemid = $itemid;
        $this->description_text  = $this->item->description;
    }

    public function submit()
    {

        $this->item->update([
            'description' => $this->description_text,
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }

    public function render()
    {
        return view('livewire.admin.product.product-description');
    }
}
