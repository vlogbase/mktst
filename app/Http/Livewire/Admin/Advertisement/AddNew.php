<?php

namespace App\Http\Livewire\Admin\Advertisement;

use Livewire\Component;
use Livewire\WithFileUploads;

class AddNew extends Component
{
    use WithFileUploads;

    public $url;
    public $image;

    
    public function render()
    {
        return view('livewire.admin.advertisement.add-new');
    }
}
