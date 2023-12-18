<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CategoryEdit extends Component
{
    use WithFileUploads;
    public $name;
    public $image;
    public $special;
    public $parent;
    public $categories;
    public $itemid;
    public $item;
    public $nowImage;
    public $slug;

    public function mount($itemid)
    {
        $this->categories = Category::all();
        $this->item = Category::find($itemid);
        $this->name = $this->item->name;
        $this->special = $this->item->special;
        $this->parent = $this->item->category_id;
        $this->nowImage = $this->item->image;
    }

    public function submit()
    {
        $this->slug = Str::slug($this->name);
        $data =  $this->validate([
            'name' => 'required|min:2|max:50|unique:categories,name,' . $this->item->id,
            'slug' => 'required|unique:categories,slug,' . $this->item->id,
            'image' => 'max:3024',
        ]);

        if ($this->image) {
            $background = $this->image->store('upload/category', 'public');

            $this->item->update([
                'image' => $background,
            ]);
        }

        $this->item->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'special' => $this->special,
            'category_id' => $this->parent == 'NULL' ? NULL : $this->parent
        ]);

        $this->emit('succesAlert', 'Updated!');
    }
    public function render()
    {
        return view('livewire.admin.category.category-edit');
    }
}
