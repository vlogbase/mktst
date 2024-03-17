<?php

namespace App\Http\Livewire\Admin\Seller;

use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $seller;


    public function mount($seller)
    {
        $this->seller = $seller;
    }

    public function render()
    {
        $items = $this->seller->products();
        
        return view('livewire.admin.seller.product-list',[
            'items' => $items->latest()->paginate(5, ['*'], 'favoritesPage'),
        ]);
    }
}
