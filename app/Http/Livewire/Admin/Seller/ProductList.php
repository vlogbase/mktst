<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $seller;
    public $currentPage = 1;
    public $path;

    public function mount($seller)
    {
        $this->seller = $seller;
        $this->currentPage = request()->query('favoritesPage', 1);
    }

    public function render()
    {
        $brands = $this->seller->brands->pluck('id');
        $items = Product::latest()->whereIn('brand_id',  $brands);
        $this->path = 'admin/sellers/'.$this->seller->id.($this->currentPage ? '?productsPage='.$this->currentPage : '') ;
        return view('livewire.admin.seller.product-list',[
            'items' => $items->paginate(5, ['*'], 'favoritesPage'),
            'path' => $this->path,
        ]);
    }
}
