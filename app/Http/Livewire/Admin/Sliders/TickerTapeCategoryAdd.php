<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\TickerTapeCategory;
use Livewire\Component;

class TickerTapeCategoryAdd extends Component
{
    public $name;

    public function submit()
    {
        $data =  $this->validate([
            'name' => 'required|min:2|max:200',
        ]);

        TickerTapeCategory::create([
            'head' => $this->name,
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }
    public function render()
    {
        return view('livewire.admin.sliders.ticker-tape-category-add');
    }
}
