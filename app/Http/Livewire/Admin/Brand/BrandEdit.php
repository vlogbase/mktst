<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;

class BrandEdit extends Component
{
    public $name;
    public $item;

    public function mount($item)
    {
        $this->item = $item;
        $this->name = $this->item->name;
    }

    public function updated($field)
    {
        if ($field == 'name') {
            $data =  $this->validate([
                'name' => 'required|min:2|max:100|unique:brands,name',
            ]);
            $this->item->update([
                'name' => $this->name,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.brand.brand-edit');
    }
}
