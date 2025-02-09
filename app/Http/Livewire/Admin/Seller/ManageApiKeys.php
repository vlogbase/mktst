<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Str;

class ManageApiKeys extends Component
{
    public $api_key;
    public $sellerId;
    public $seller;
    public $name;
    public $email;
    public $auto_extend;
    public $valid_till;


    public function mount($sellerId)
    {

        $this->seller = Seller::findOrFail($sellerId);
        $this->name = $this->seller->name;
        $this->email = $this->seller->email;
        $this->api_key = $this->seller->api_key;
        $this->auto_extend = $this->seller->is_autoextended;
    }

    public function generateApiKey()
    {
        $this->api_key = strtoupper(Str::random(10)). time(). strtoupper(Str::random(10));
    }

    public function updateApiKey()
    {
        $this->valid_till = date('Y-m-d H:i:s', strtotime('+30 days'));
        $this->validate([
            'api_key' =>
            $this->sellerId != 0 ? 'required|min:2|max:100|unique:sellers,api_key,' . $this->sellerId : 'required|min:2|max:100|unique:sellers,api_key',
        ]);

        $this->seller->update(
            [
                'api_key' => $this->api_key,
                'is_autoextended' => $this->auto_extend,
                'valid_till' => $this->valid_till
            ]
        );


        if ($this->auto_extend) {
            $this->emit('autoExtendSelected', [
                'title' => 'API Key Updated',
                'line1' => 'Auto-Extending API Key Selected',
                'line2' => 'Your API key is set to automatically renew every 30 days.',
                'line3' => 'While this option offers convenience, please be aware of the following:',
                'line4' => 'Regular Review: Ensure you periodically review your key usage and permissions to maintain security.',
                'line5' => 'Monitoring: Keep an eye on your API usage patterns for any unauthorized activity.'
            ]);
        } else {
            $this->emit('autoExtendNotSelected', [
                'title' => 'API Key Updated',
                'line1' => 'Api key will not be auto extended'
            ]);
        }
        //$this->emit('succesAlert', 'Updated!');
    }

    public function render()
    {
        return view('livewire.admin.seller.manage-api-keys');
    }
}
