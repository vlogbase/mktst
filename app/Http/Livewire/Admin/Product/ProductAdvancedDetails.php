<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductDetail;
use Livewire\Component;

class ProductAdvancedDetails extends Component
{
    public $item;
    public $itemid;
    public $unit_weight;
    public $meta_title;
    public $meta_description;
    public $pack;

    public function mount($itemid)
    {
        $this->item = ProductDetail::where('product_id', $itemid)->first();
        $this->itemid = $itemid;
        $this->unit_weight  = $this->item->unit_weight;
        $this->meta_title  = $this->item->meta_title;
        $this->meta_description  = $this->item->meta_description;
        $this->pack  = $this->item->pack;
    }

    public function submit()
    {
        $data =  $this->validate([
            'meta_title' => 'required|min:2|max:90',
            'meta_description' => 'required|min:2|max:200',
            'unit_weight' => 'required|gte:0',
            'pack' => 'nullable|min:2|max:10',
        ]);

        $this->item->update([
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'unit_weight' => $this->unit_weight,
            'pack' => $this->pack,
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }
    public function render()
    {
        return view('livewire.admin.product.product-advanced-details');
    }
}
