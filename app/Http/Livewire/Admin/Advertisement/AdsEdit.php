<?php

namespace App\Http\Livewire\Admin\Advertisement;

use Livewire\Component;
use Livewire\WithFileUploads;

class AdsEdit extends Component
{
    use WithFileUploads;
    public $url;
    public $image;
    public $start_date;
    public $end_date;
    public $side = 'left';
    public $nowImage;
    public $advert;

    public function mount($advert){
        $this->url = $advert->redirect_url;
        $this->start_date = $advert->start_live_date;
        $this->end_date = $advert->end_live_date;
        $this->side = $advert->side;
        $this->nowImage = $advert->getImageUrl();
        $this->advert = $advert;
    }

    public function submit()
    {
        $data =  $this->validate([
            'url' => 'required',
            'image' => 'nullable|image|max:8024',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'side' => 'required|in:left,right',
        ]);

        if ($this->image) {
            $background = $this->image->store('upload/ads', 'public');
            //Update if image is not null
            $this->advert->update([
                'image_url' => $background,
            ]);
        } 

        $this->advert->update([
            'redirect_url' => $this->url,
            'start_live_date' => $this->start_date,
            'end_live_date' => $this->end_date,
            'side' => $this->side,
        ]);


        $this->emit('succesAlert', 'Editted!');
    }


    public function render()
    {
        return view('livewire.admin.advertisement.ads-edit');
    }
}
