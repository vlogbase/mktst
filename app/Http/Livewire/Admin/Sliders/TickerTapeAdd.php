<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\TickerTape;
use App\Models\TickerTapeCategory;
use Livewire\Component;

class TickerTapeAdd extends Component
{
    public $name;
    public $category;
    public $categories;

    protected $listeners = [
        'refreshList' => 'refreshList'
    ];

    public function mount(){
        $this->getCategories();
    }

    public function getCategories(){
        $this->categories = TickerTapeCategory::all();
    }

    public function refreshList()
    {
        $this->getCategories();
    }

    public function submit()
    {
        $data =  $this->validate([
            'name' => 'required|min:2|max:200',
            'category' => 'required'
        ]);

        TickerTape::create([
            'text' => $this->name,
            'category_id' => $this->category ? $this->category : null
        ]);

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
    }

    public function render()
    {
        
        return view(
            'livewire.admin.sliders.ticker-tape-add',
            [
                'categories' =>  $this->categories
            ]
        );
    }
}
