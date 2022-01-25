<?php

namespace App\Http\Livewire\Customer\Cart;

use Livewire\Component;

class HeaderCart extends Component
{
    public $cartItems;
    protected $listeners = [
        'itemAdded' => 'getData',
        'itemRemoved' => 'getData',
        'itemUpdated' => 'getData',
    ];

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->cartItems = \Cart::getContent();
        $this->cartTotal = \Cart::getSubTotal();
    }

    public function removeItem($id)
    {
        \Cart::remove($id);
        $this->emit('itemRemoved');
        $this->getData();
    }

    public function render()
    {
        return view('livewire.customer.cart.header-cart');
    }
}
