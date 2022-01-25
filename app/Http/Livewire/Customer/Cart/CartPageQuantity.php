<?php

namespace App\Http\Livewire\Customer\Cart;

use Livewire\Component;

class CartPageQuantity extends Component
{

    public $item;
    public $quantity;
    public $itemid;

    public function mount($item)
    {
        $this->item = $item;
        $this->itemid = $item->id;

        if ($item->quantity > 500) {
            $this->quantity = 500;
            \Cart::update($this->itemid, array(
                'quantity' => array(
                    'relative' => false,
                    'value' =>  $this->quantity
                ),
            ));
            $this->emit('itemUpdated');
        } else {
            $this->quantity = $item->quantity;
        }
    }

    public function changeMinus()
    {

        \Cart::update($this->itemid, array(
            'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));
        $this->quantity = $this->quantity - 1;
        if ($this->quantity == 0) {
            \Cart::remove($this->itemid);
            $this->emit('itemRemoved');
        } else {
            $this->emit('itemUpdated');
        }
    }

    public function changePlus()
    {
        if ($this->quantity >= 500) {
            $this->emit('errorShow', 'Max Quantity');
        } else {
            $this->quantity = $this->quantity + 1;
            \Cart::update($this->itemid, array(
                'quantity' => 1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
            ));
            $this->emit('itemUpdated');
        }
    }

    public function updatedQuantity($val)
    {
        if (is_numeric($val)) {
            if ($val > 500) {
                $this->quantity = 500;

                $this->emit('errorShow', 'Max Quantity');
            } else if ($val <= 0) {
                $this->quantity = 1;
            } else {
                $this->quantity = $val;
            }
        } else {
            $this->quantity = 1;
            $this->emit('errorShow', 'Must be a number');
        }

        \Cart::update($this->itemid, array(
            'quantity' => array(
                'relative' => false,
                'value' =>  $this->quantity
            ),
        ));
        $this->emit('itemUpdated');
    }

    public function render()
    {
        return view('livewire.customer.cart.cart-page-quantity');
    }
}
