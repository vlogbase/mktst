<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class PriceFilter extends Component
{
    public $product_max_price;
    public $price_first;
    public $price_second;
    public $appliedFilter = '';

    public function mount($product_max_price)
    {
        $this->product_max_price = $product_max_price;
        $this->price_first = 0;
        $this->price_second = $this->product_max_price;
    }


    protected $rules = [
        'price_first' => 'required|gte:0',
        'price_second' => 'required|gte:1|gt:price_first',
    ];

    public function applyFilter()
    {
        $this->validate();

        $prices = [
            'minPrice' => $this->price_first,
            'maxPrice' => $this->price_second
        ];
        $this->emit('changePrice', $prices);
        $this->appliedFilter = '£' . $this->price_first . '-£' . $this->price_second;
    }

    public function removeFilter()
    {
        $this->emit('removedPrice');
        $this->appliedFilter = '';
    }

    public function render()
    {
        return view('livewire.customer.price-filter');
    }
}
