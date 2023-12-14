<?php

namespace App\Http\Livewire\Customer;

use App\Models\Popup;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LastOrderPopup extends Component
{
    public $showModal = true;
    public $popup;


    public function mount()
    {
        $this->popup = Popup::first();
        // IF popup is not created yet
        if (!$this->popup) {
            $popup = new Popup();
            $popup->head = 'Get 10% off on your first order';
            $popup->btn_text = 'Shop Now';
            $popup->btn_url = '#';
            $popup->image = 'https://via.placeholder.com/500x500?text=Popup+Image';
            $popup->status = 0;
            $popup->save();
            $this->popup = $popup->fresh();
        }

        $this->showModal = $this->popup->status;


    }

    public function render()
    {
        return view('livewire.customer.last-order-popup');
    }


    public function closeModal()
    {
        $this->showModal = false;
    }

}
