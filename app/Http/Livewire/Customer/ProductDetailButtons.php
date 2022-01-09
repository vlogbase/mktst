<?php

namespace App\Http\Livewire\Customer;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductDetailButtons extends Component
{
    public Product $product;
    public $userFavorited = 0;
    public $quantity = 1;

    public function channgeQty($type)
    {

        if ($type == '-') {
            if ($this->quantity > 1) {
                $this->quantity = $this->quantity - 1;
            }
        } else if ($type == '+') {
            if ($this->quantity < 500) {
                $this->quantity = $this->quantity + 1;
            }
        }
    }


    public function addToCart()
    {
        $current_stock = Product::find($this->product->id)->calcStock();
        if (Auth::check()) {
            if ($current_stock > 0) {
                //Add to Cart
                $this->emit('itemAdded');
            } else {
                $this->emit('errorShow', 'Not enough stock');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }

    public function addToFav()
    {
        if (Auth::check()) {
            if ($this->userFavorited) {
                $this->userFavorited = 0;
                $this->emit('succesShow', 'Removed from favorites');
            } else {
                $this->userFavorited = 1;
                $this->emit('succesShow', 'Added to favorites');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }
    public function render()
    {
        return view('livewire.customer.product-detail-buttons');
    }
}
