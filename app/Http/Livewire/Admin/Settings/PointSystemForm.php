<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\PointSystem;
use Livewire\Component;

class PointSystemForm extends Component
{
    public $price;
    public $campaign;
    public $campaign_price;
    public PointSystem $point_system;

    public function mount()
    {
        $point_system = PointSystem::first();
        $this->point_system = $point_system;
        $this->earn_coefficient = $point_system->earn_coefficient;
        $this->status = $point_system->status;
        $this->spend_coefficient = $point_system->spend_coefficient;
    }

    public function submit()
    {
        $data =  $this->validate([
            'earn_coefficient' => 'required|gte:0',
            'status' => 'required',
            'spend_coefficient' => 'required|gte:0',
        ]);


        $this->point_system->update([
            'status' => $this->status,
            'spend_coefficient' => $this->spend_coefficient,
            'earn_coefficient' => $this->earn_coefficient
        ]);

        $this->emit('succesAlert', 'Point System settings updated!');
    }
    public function render()
    {
        return view('livewire.admin.settings.point-system-form');
    }
}
