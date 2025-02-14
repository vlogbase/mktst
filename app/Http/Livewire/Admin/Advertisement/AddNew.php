<?php

namespace App\Http\Livewire\Admin\Advertisement;

use App\Models\Advert;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNew extends Component
{
    use WithFileUploads;

    public $url;
    public $image;
    public $start_date;
    public $end_date;
    public $side = 'left';

    public function submit()
    {
        $data =  $this->validate([
            'url' => 'required',
            'image' => 'required|image|max:8024',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'side' => 'required|in:left,right',
        ]);

        if ($this->image) {
            $background = $this->image->store('upload/ads', 'public');
        } else {
            $background = NULL;
        }

        $item = Advert::create([
            'image_url' => $background,
            'redirect_url' => $this->url,
            'start_live_date' => $this->start_date,
            'end_live_date' => $this->end_date,
            'side' => $this->side,
        ]);
       

        $this->emit('succesAlert', 'Added!');
        redirect()->route('admin.contents.other.advertisement.list');
    }

    
    public function render()
    {
        return view('livewire.admin.advertisement.add-new');
    }
}
