<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;

class BrandAdd extends Component
{
    public $name;

    public function submit()
    {
        $data =  $this->validate([
            'name' => 'required|min:2|max:100|unique:brands,name',
        ]);

        Brand::create([
            'name' => $this->name
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }
    public function render()
    {
        return view('livewire.admin.brand.brand-add');
    }
}
