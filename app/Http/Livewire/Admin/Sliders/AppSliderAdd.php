<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\AppSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AppSliderAdd extends Component
{
    use WithFileUploads;

    public $photos = [];

    public function submit()
    {
        $data =  $this->validate([
            'photos.*' => 'max:3024',
        ]);

        foreach ($this->photos as $photo) {
            $background = $photo->store('upload/mobilesliders', 'public');

            AppSlider::create([
                'image' => $background
            ]);
        }

        $this->emit('succesAlert', 'Added!');
        $this->emit('refreshList');
        $this->photos = [];
    }

    public function removeMe($index)
    {
        array_splice($this->photos, $index, 1);
    }
    public function render()
    {
        return view('livewire.admin.sliders.app-slider-add');
    }
}
