<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use Illuminate\Support\Str;

class ApiSettingsForm extends Component
{
    public $api_key;
    public $admin;
    public $auto_extend;
    public $valid_till;

    public function mount()
    {
        if(auth()->guard('admin')->check()){
            $this->admin = auth()->guard('admin')->user();
            $this->api_key = $this->admin->api_key;
            $this->auto_extend = $this->admin->is_autoextended;
            $this->valid_till = $this->admin->valid_till;
        }else{
            $this->admin = null;
        }
    }

    public function generateApiKey()
    {
        $this->api_key = strtoupper(Str::random(10)) . time() . strtoupper(Str::random(10));
    }

    public function updateApiKey()
    {
        $this->valid_till = date('Y-m-d H:i:s', strtotime('+30 days'));
        $this->validate([
            'api_key' =>
            $this->admin != null ? 'required|min:2|max:100|unique:admins,api_key,' . $this->admin->id : 'required|min:2|max:100|unique:admins,api_key',
        ]);

        $this->admin->update(
            [
                'api_key' => $this->api_key,
                'is_autoextended' => $this->auto_extend,
                'valid_till' => $this->valid_till
            ]
        );


        if ($this->auto_extend) {
            $this->emit('succesAlert', 'Updated! Api key will be auto extended');
        } else {
            $this->emit('succesAlert', 'Updated! Api key will not be auto extended');
        }
        //$this->emit('succesAlert', 'Updated!');
    }

    public function render()
    {
        return view('livewire.admin.settings.api-settings-form');
    }
}
