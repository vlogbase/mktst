<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Shipping;
use Livewire\Component;

class ShippingPriceForm extends Component
{
    public $price;
    public $campaign;
    public $campaign_price;
    public Shipping $shipping_settings;

    public function mount()
    {
        $shipping_settings = Shipping::first();
        $this->shipping_settings = $shipping_settings;
        $this->price = $shipping_settings->price;
        $this->campaign = $shipping_settings->campaign;
        $this->campaign_price = $shipping_settings->campaign_price;
    }

    public function submit()
    {
        $data =  $this->validate([
            'price' => 'required|gte:0',
            'campaign' => 'required',
            'campaign_price' => $this->campaign ? 'required|gte:0' : 'nullable',
        ]);

        if (!$this->campaign) {
            $this->campaign_price = 0;
        }

        $this->shipping_settings->update([
            'price' => $this->price,
            'campaign' => $this->campaign,
            'campaign_price' => $this->campaign_price
        ]);

        $this->emit('succesAlert', 'Shipping settings updated!');
    }

    public function render()
    {
        return view('livewire.admin.settings.shipping-price-form');
    }
}
