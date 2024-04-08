<?php

namespace App\Http\Livewire\Seller;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductAssigner extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public $seller;

    public function mount($seller)
    {
        $this->seller = $seller;
    }

    public function updated($field)
    {
        if ($field == 'search') {
            $this->resetPage();
        }
    }

    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search_text = $this->search;
        $sellerDetail = $this->seller->sellerDetail;
        $brands = $sellerDetail->brands->pluck('id');
        $productList = DB::table('seller_product')->where('seller_id', $this->seller->id)->get();
        $productIds = $productList->pluck('product_id');

        $items = Product::latest()->whereIn('id',  $productIds)->where(function ($query) use ($search_text) {
            if ($search_text) {
                $query->where('name', 'LIKE', '%' . $search_text . '%')->orWhere('sku', 'LIKE', '%' . $search_text . '%');
            }
        })->paginate(20);
        return view('livewire.seller.product-assigner', [
            'items' => $items,
        ]);
    }
}
