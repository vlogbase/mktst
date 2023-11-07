<?php

namespace App\Http\Livewire\Customer;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LastOrderPopup extends Component
{
    public $showModal = false;
    public $orderId;
    public $lastOrder;
    public $cartItems;


    public function mount()
    {
        $this->lastOrder = Auth::user()->userorders->sortByDesc('created_at')->first();
        $this->showModal = !is_null($this->lastOrder);
        $this->cartItems = \Cart::getContent();
    }

    public function render()
    {
        return view('livewire.customer.last-order-popup');
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

    public function addToCart($productId)
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
                    'quantity' => 1,
                    'attributes' => array(
                        'image' => $currentProduct->getCoverImage(),
                        'slug' => $currentProduct->slug,
                        'tax' => $currentProduct->taxrate
                    )
                ]);
                //Added to Cart
                $this->emit('itemAdded');
                $this->cartItems = \Cart::getContent();
            } else {
                $this->emit('errorShow', 'Not enough stock');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }

    public function addAllOfThem(){
        foreach ($this->lastOrder->orderproducts as $item) {
           $this->addToCart($item->product_id);
        }
        $this->showModal = false;
    }
}
