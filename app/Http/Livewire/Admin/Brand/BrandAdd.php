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

       if(auth()->guard('seller')){
            $sellerId = auth()->guard('seller')->user()->sellerDetail->id;
       }else{
            $sellerId = null;
       }

        Brand::create([
            'name' => $this->name,
            'seller_detail_id' => $sellerId
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }
    public function render()
    {
        return view('livewire.admin.brand.brand-add');
    }
}
