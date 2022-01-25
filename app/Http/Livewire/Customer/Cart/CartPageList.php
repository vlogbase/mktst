<?php

namespace App\Http\Livewire\Customer\Cart;

use Livewire\Component;

class CartPageList extends Component
{

    public $cartItems;
    protected $listeners = [
        'itemAdded' => 'getData',
        'itemRemoved' => 'getData',
        'itemUpdated' => 'getData',
    ];

    public $quantity;

    public function mount()
    {
        $this->getData();
    }


    public function getData()
    {
        $this->cartItems = \Cart::getContent();
    }

    public function removeItem($id)
    {
        \Cart::remove($id);
        $this->emit('itemRemoved');
        $this->getData();
    }

    public function render()
    {
        $this->cartItems = \Cart::getContent();
        return view('livewire.customer.cart.cart-page-list', [
            'cartItems' => $this->cartItems
        ]);
    }
}
