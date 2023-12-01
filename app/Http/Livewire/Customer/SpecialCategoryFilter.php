<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class SpecialCategoryFilter extends Component
{   
    public $specialCategoryFilter = [];

    public function render()
    {
        return view('livewire.customer.special-category-filter');
    }


    public function filter()
    {
        $this->emit('specialCategoryFilter', $this->specialCategoryFilter);
    }
}
