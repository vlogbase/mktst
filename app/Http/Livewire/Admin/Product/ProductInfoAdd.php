<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\ProductInfo;
use Livewire\Component;

class ProductInfoAdd extends Component
{
    public $key;
    public $value;
    public $itemid;

    public function mount($itemid)
    {
        $this->itemid = $itemid;
    }

    public function submit()
    {
        $data =  $this->validate([
            'key' => 'required|min:2|max:100',
            'value' => 'required|min:2|max:100',
        ]);

        ProductInfo::create([
            'key' => $this->key,
            'value' => $this->value,
            'product_id' => $this->itemid
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }

    public function render()
    {
        return view('livewire.admin.product.product-info-add');
    }
}
