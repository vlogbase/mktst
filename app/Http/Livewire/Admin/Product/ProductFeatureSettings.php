<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\ProductDetail;
use Livewire\Component;

class ProductFeatureSettings extends Component
{

    public $item;
    public $itemid;

    public $featured;
    public $best_seller;
    public $new_arrival;
    public $special_offer;

    public function mount($itemid)
    {
        $this->item = ProductDetail::where('product_id', $itemid)->first();
        $this->itemid = $itemid;
        $this->featured = $this->item->featured;
        $this->best_seller = $this->item->best_seller;
        $this->special_offer = $this->item->special_offer;
        $this->new_arrival = $this->item->new_arrival;
    }

    public function submit()
    {
        $this->item->update([
            'featured' => $this->featured ? 1 : 0,
            'best_seller' => $this->best_seller ? 1 : 0,
            'special_offer' => $this->special_offer ? 1 : 0,
            'new_arrival' => $this->new_arrival ? 1 : 0,

        ]);
        $this->emit('succesAlert', 'Updated!');
    }

    public function render()
    {
        return view('livewire.admin.product.product-feature-settings');
    }
}
