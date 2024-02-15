<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryProduct extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category;
    public $path;

    public function mount($itemid)
    {
        $this->category = Category::find($itemid);
    }

    public function render()
    {
        $this->path = url()->current();
        $items = $this->category->products();
        return view('livewire.admin.category.category-product', [
            'items' => $items->latest()->paginate(20, ['*'], 'productsPage'),
            'path' => $this->path,
        ]);
    }
}
