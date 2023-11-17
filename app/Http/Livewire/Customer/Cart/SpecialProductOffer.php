<?php

namespace App\Http\Livewire\Customer\Cart;

use App\Models\Product;
use Livewire\Component;

class SpecialProductOffer extends Component
{
    public $products;

    public function mount()
    {
        $inCartProducts = \Cart::getContent();
        //Without this, the special offer products will be displayed in the cart page
        $this->products = Product::whereNotIn('id', $inCartProducts->pluck('id'))
        ->where('discount', '>', 0)
        ->take(4)->get();
    }

    public function render()
    {
        return view('livewire.customer.cart.special-product-offer');
    }
}
