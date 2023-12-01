<?php

namespace App\Http\Livewire\Customer;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categoryCurrent;
    public $limitPerPage = 12;
    public $order;
    public $order_direct;
    public $max_cost = 50000;
    public $min_cost = 0;
    public $discountFilter = false;
    public $selectedBrands = [];
    public $searchSpecialCategory = [];

    protected $listeners = [
        'changeOrder' => 'changeOrder',
        'changePrice' => 'changePrice',
        'removedPrice' => 'removedPrice',
        'discountFilter' => 'discountFilter',
        'brandFilter' => 'brandFilter',
        'specialCategoryFilter' => 'specialCategoryFilter',
        'loadMore' => 'loadMore',
    ];

    public function mount($categoryCurrent)
    {
        $this->categoryCurrent = $categoryCurrent;
        $this->order = 'latest';
    }

    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 6;
    }

    public function changeOrder($val)
    {
        $this->limitPerPage = 12;
        $this->order = $val;
    }

    public function changePrice($prices)
    {
        if ($prices['minPrice'] != 0)
            $this->min_cost = $prices['minPrice'];
        $this->max_cost = $prices['maxPrice'];
        $this->limitPerPage = 12;
    }

    public function removedPrice()
    {
        $this->min_cost = 0;
        $this->max_cost = 50000;
        $this->limitPerPage = 12;
    }

    public function discountFilter($filter)
    {
        if ($filter == true) {
            $this->discountFilter = true;
        } else {
            $this->discountFilter = false;
        }
        $this->limitPerPage = 12;
    }

    public function brandFilter($brands)
    {
        $this->selectedBrands = $brands;
        $this->limitPerPage = 12;
    }

    public function specialCategoryFilter($specialCategoryFilter)
    {
        $this->searchSpecialCategory = $specialCategoryFilter;
        $this->limitPerPage = 12;
    }

    public function render()
    {
        if ($this->order == 'latest') {
            $query_order = 'id';
            $query_order_direct = 'desc';
        } else if ($this->order == 'cheapest') {
            $query_order = 'unit_price';
            $query_order_direct = 'asc';
        } else if ($this->order == 'expensive') {
            $query_order = 'unit_price';
            $query_order_direct = 'desc';
        }

        if ($this->categoryCurrent == null) {
            $products = Product::where('status', 1)->whereBetween('unit_price', [$this->min_cost, $this->max_cost])->orderBy($query_order, $query_order_direct)->paginate($this->limitPerPage);
            $products_cnt = Product::where('status', 1)->whereBetween('unit_price', [$this->min_cost, $this->max_cost])->count();
        } else {
            $category = Category::where('id', $this->categoryCurrent->id)->first();

            $products_query = $category->activeProducts()->where('status', 1)
                ->whereBetween('unit_price', [$this->min_cost, $this->max_cost]);

            if ($this->discountFilter == true) {
                $products_query->where('discount', '>', 0);
            }

            if (count($this->selectedBrands) > 0) {
                $products_query->whereIn('brand_id', $this->selectedBrands);
            }

            if (count($this->searchSpecialCategory) > 0) {
                // product connected product_infos table search for values
                $products_query->whereHas('productinfos', function ($query) {
                    $query->where('key', 'like', '%type%');
                    $query->whereIn('value', $this->searchSpecialCategory );
                });
            }

            $products = $products_query->orderBy($query_order, $query_order_direct);
            $products_cnt = $products_query->count();
            $products = $products->paginate($this->limitPerPage);
        }

        $this->emit('changeCount', $products_cnt);
        $this->emit('productStore');
        return view('livewire.customer.product-list', [
            'products' => $products
        ]);
    }
}
