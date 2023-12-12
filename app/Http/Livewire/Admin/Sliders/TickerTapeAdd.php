<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\TickerTape;
use Livewire\Component;

class TickerTapeAdd extends Component
{
    public $name;

    public function submit()
    {
        $data =  $this->validate([
            'name' => 'required|min:2|max:200',
        ]);

        TickerTape::create([
            'text' => $this->name
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }

    public function render()
    {
        return view('livewire.admin.sliders.ticker-tape-add');
    }
}
