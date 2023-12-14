<?php

namespace App\Http\Livewire\Admin\Popup;

use App\Models\Popup;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPopUp extends Component
{
    use WithFileUploads;
    public $popup;
    public $head;
    public $btn_text;
    public $btn_url;
    public $image;
    public $status;
    public $nowImage;
    

    public function mount()
    {
        $this->popup = \App\Models\Popup::first();
        // IF popup is not created yet
        if (!$this->popup) {
            $popup = new \App\Models\Popup();
            $popup->head = 'Get 10% off on your first order';
            $popup->btn_text = 'Shop Now';
            $popup->btn_url = '#';
            $popup->image = 'https://via.placeholder.com/500x500?text=Popup+Image';
            $popup->status = 0;
            $popup->save();
            $this->popup = $popup->fresh();
        }

        $this->head = $this->popup->head;
        $this->btn_text = $this->popup->btn_text;
        $this->btn_url = $this->popup->btn_url;
        $this->status = $this->popup->status;
        $this->nowImage = $this->popup->image;

    }

    public function submit()
    {
        $data =  $this->validate([
            'head' => 'required|min:2|max:50',
            'btn_text' => 'required|min:2|max:50',
            'btn_url' => 'required|min:2|max:1000',
        ]);

        if ($this->image) {
            $background = $this->image->store('upload/popup', 'public');
            // Update the image
            $this->popup->update([
                'image' => $background,
            ]);
        } else {
            $background = NULL;
        }

        $this->popup->update([
            'head' => $this->head,
            'btn_text' => $this->btn_text,
            'btn_url' => $this->btn_url,
            'status' => $this->status,
            
        ]);

        $this->emit('succesAlert', 'Updated!');
    }

    public function render()
    {
        return view('livewire.admin.popup.edit-pop-up');
    }
}
