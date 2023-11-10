<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class ProductBrandFilter extends Component
{
    public $brands;
    public $filteredBrands;
    public $showMoreBoolean = false;

    public $showMoreButtonStatus = false;
    public $perPage = 5;
    public $brandCount = 0;
    public $selectedBrands = [];



    public function mount($brands)
    {
        $this->brands = $brands;
        if ($this->brands) {
            $this->brandCount = $this->brands->count();
            if ($this->brands->count() > 5) {
                $this->showMoreBoolean = true;
            } else {
                $this->showMoreBoolean = false;
            }
        }
    }

    public function applyShowBtn()
    {
        $this->showMoreButtonStatus = !$this->showMoreButtonStatus;

        if ($this->showMoreButtonStatus) {
            $this->perPage = $this->brandCount;
        } else {
            $this->perPage = 5;
        }
    }

    public function changeBrands()
    {
        $this->emit('brandFilter', $this->selectedBrands);
    }

    public function render()
    {
        return view('livewire.customer.product-brand-filter');
    }
}
