<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use RalphJSmit\Livewire\Urls\Facades\Url;

class CategoryProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category;
    public $path;
    public $productsPage = 1;

    public function mount($itemid)
    {
        $this->category = Category::find($itemid);
        $this->productsPage = request()->query('productsPage', 1);
    }

    public function render()
    {
        $this->path = 'admin/categories/'.$this->category->id.($this->productsPage ? '?productsPage='.$this->productsPage : '') ;
        $items = $this->category->products();
        return view('livewire.admin.category.category-product', [
            'items' => $items->latest()->paginate(20, ['*'], 'productsPage'),
            'path' => $this->path,
        ]);
    }
}
