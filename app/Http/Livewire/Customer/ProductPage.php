<?php

namespace App\Http\Livewire\Customer;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductPage extends Component
{
    public $categoryCurrent;
    public $categories;
    public $product_count;
    public $product_max_price;
    public $order_select;

    protected $listeners = [
        'changeCount' => 'changeCount',
    ];

    public function mount($categoryCurrent)
    {
        $this->categoryCurrent = $categoryCurrent;
        $this->order_select = 'latest';
        $this->dataInit();
    }

    public function hydrate()
    {
        $this->dataInit();
    }

    public function dataInit()
    {
        if ($this->categoryCurrent) {
            $this->categories = $this->categoryCurrent->childrenCategories;
            $this->product_count = $this->categoryCurrent->products()->where('status', 1)->count();
            $this->product_max_price = $this->categoryCurrent->products()->max('unit_price') + 1;
        } else {
            $this->categories = Category::where('category_id', NULL)->get();
            $this->product_count = Product::all()->where('status', 1)->count();
            $this->product_max_price = Product::max('unit_price') + 1;
        }
    }

    public function changeCount($val)
    {
        $this->product_count = $val;
    }

    public function updatedOrderSelect($val)
    {
        $this->emit('changeOrder', $val);
        $this->order_select = $val;
        $this->dataInit();
    }

    public function render()
    {
        return view('livewire.customer.product-page');
    }
}
