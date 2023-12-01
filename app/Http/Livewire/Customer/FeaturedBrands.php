<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class FeaturedBrands extends Component
{

    public $featuredBrands;
    public $selectedBrands = [];

    protected $listeners = [
        'brandFilter' => 'checkFilter',
    ];
    public function checkFilter($brands)
    {
        $this->selectedBrands = $brands;
    }

    public function mount($brands)
    {
        $this->featuredBrands = $brands;
    }


    public function selectBrand($brand)
    {
        $this->selectedBrands = [];
        if($brand != 'ALL'){
            array_push($this->selectedBrands, $brand);
        }
       
        $this->emit('brandFilter', $this->selectedBrands);
        
    }

    public function render()
    {
        return view('livewire.customer.featured-brands');
    }
}
