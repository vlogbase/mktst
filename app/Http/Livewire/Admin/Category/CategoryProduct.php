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

    public function mount($itemid)
    {
        $this->category = Category::find($itemid);
    }

    public function render()
    {
        $items = $this->category->products();
        return view('livewire.admin.category.category-product', [
            'items' => $items->latest()->paginate(20, ['*'], 'productsPage'),
        ]);
    }
}
