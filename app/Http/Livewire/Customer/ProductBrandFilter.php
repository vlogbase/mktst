<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class ProductBrandFilter extends Component
{
    public $brands;
    public $filteredBrands;
    public $showMoreBoolean = false;

    public $showMoreButtonStatus = false;

    public function mount($brands)
    {
        $this->brands = $brands;
        if($this->brands->count() > 5) {
            $this->filteredBrands = $this->brands->take(5);
            $this->showMoreBoolean = true;
        }else{
            $this->filteredBrands = $this->brands;
            $this->showMoreBoolean = false;
        }

    }
    
    public function applyShowBtn(){
        $this->showMoreButtonStatus = !$this->showMoreButtonStatus;

        if($this->showMoreButtonStatus){
            $this->filteredBrands = $this->brands->take(5);
        }else{
            $this->filteredBrands = $this->brands;
        }
    }

    public function render()
    {
        return view('livewire.customer.product-brand-filter');
    }
}
