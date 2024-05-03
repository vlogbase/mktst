<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CategoryAdd extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $parent = '';
    public $parent_categories;
    public $categories;
    public $slug;

    public function mount()
    {
        $this->categories = Category::all();
        $this->parent = NULL;
        $this->parent_categories = Category::where('category_id', NULL)->get();
    }

    public function submit()
    {
        $this->slug = Str::slug($this->name);
        $data =  $this->validate([
            'name' => 'required|min:2|max:50|unique:categories,name',
            'slug' => 'required|unique:categories,slug',
            'image' => 'max:3024',
        ]);

        if ($this->image) {
            $background = $this->image->store('upload/category', 'public');
        } else {
            $background = NULL;
        }

        $item = Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'image' => $background,
            'category_id' => $this->parent == 'NULL' ? NULL : $this->parent
        ]);
        return redirect()->route('admin.categories.detail', $item->id);
    }

    public function render()
    {
        return view('livewire.admin.category.category-add');
    }
}
