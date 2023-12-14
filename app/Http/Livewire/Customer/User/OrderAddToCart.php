<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderAddToCart extends Component
{
    public $product;
    public $quantity;

    public function mount($product, $quantity)
    {
        $this->product = $product;
        $this->quantity = intval($quantity);
    }

    public function addToCart($productId, $quantity)
    {   
        $currentProduct = Product::find($productId);
        $current_stock = $currentProduct->calcStock();
        if (Auth::check()) {
            if ($current_stock > 0) {
                //Add to Cart
                \Cart::add([
                    'id' => $currentProduct->id,
                    'name' => $currentProduct->name,
                    'price' => $currentProduct->showPrice(),
                    'quantity' => $quantity,
                    'attributes' => array(
                        'image' => $currentProduct->getCoverImage(),
                        'slug' => $currentProduct->slug,
                        'tax' => $currentProduct->taxrate
                    )
                ]);
                //Added to Cart
                $this->emit('itemAdded');
            } else {
                $this->emit('errorShow', 'Not enough stock');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }

    public function render()
    {
        return view('livewire.customer.user.order-add-to-cart');
    }
}
