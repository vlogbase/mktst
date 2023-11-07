<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderAgainButton extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
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
            } else {
                $this->emit('errorShow', 'Not enough stock');
            }
        } else {
            $this->emit('loginShow', 'Login Required!');
        }
    }

    public function addAllOfThem(){
        $order = Order::where('id', $this->orderId)->where('user_id',auth()->user()->id)->firstOrFail();
        foreach ($order->orderproducts as $item) {
           $this->addToCart($item->product_id);
        }
        redirect()->route('cart');
    }
    public function render()
    {
        return view('livewire.customer.user.order-again-button');
    }
}
