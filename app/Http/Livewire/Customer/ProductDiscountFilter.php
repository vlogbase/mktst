<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class ProductDiscountFilter extends Component
{
    public $discountFilter;

    public function render()
    {
        return view('livewire.customer.product-discount-filter');
    }

    public function changeDiscountFilter()
    {   
        $this->emit('discountFilter', $this->discountFilter);
    }
}
