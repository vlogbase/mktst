<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class DeleteButton extends Component
{
    public $itemid;

    protected $listeners = ['processDone' => 'eventOkay'];

    public function deleteItem($id)
    {
        $this->emit('deletedOkay', $id);
    }

    public function eventOkay($postId)
    {
        $category = Category::findOrFail($postId);

        if ($category->childrenCategories->count() > 0) {
            $this->emit('errorAlert', 'Category has ' . $category->childrenCategories->count() . ' childs!');
        } else {
            $category->products()->detach();
            $category->delete();
            $this->emit('succesAlert', 'Deleted!');
            return redirect()->route('admin.categories.list');
        }
    }
    public function render()
    {
        return view('livewire.admin.category.delete-button');
    }
}
