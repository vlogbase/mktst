<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;

class GeneralSettingsForm extends Component
{
    public $settings;

    public function mount()
    {
        $this->settings = Setting::all();
    }

    protected $rules = [
        'settings.*.status' => 'required',
    ];

    public function submit()
    {

        foreach ($this->settings as $post) {
            $post->save();
        }

        $this->emit('succesAlert', 'Settings updated!');
    }
    public function render()
    {
        return view('livewire.admin.settings.general-settings-form');
    }
}
