<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\Address;
use App\Models\User;
use App\Models\UserOffice;
use App\Traits\AddressHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddressForm extends Component
{
    use AddressHelper;
    public User $user;
    public Address $address;
    public $edit = false;
    public $companyOptions;
    public $curSuggestions;
    public $zipcode;
    public $address_select;

    public function mount()
    {
        $this->user = Auth::user();
        $this->company_name = $this->user->name;
        $this->address = $this->user->userdetail->address;
        $this->edit = false;
        $this->companyOptions = collect([]);
        $this->curSuggestions = collect([]);
    }

    public function hydrate()
    {
        $this->companyOptions = $this->curSuggestions;
    }

    public function editAddress()
    {
        $this->edit = true;
    }

    public function findAddress()
    {
        if ($this->zipcode != '') {
            $this->companyOptions = collect([]);
            $response = $this->getAddressListZipcode($this->zipcode);
            foreach ($response->addresses as $opt) {
                $opt = json_decode(json_encode($opt), true);
                $this->companyOptions->push($opt);
                $this->curSuggestions->push($opt);
            }
        } else {
            $this->addError('zipcode', 'Please type your zipcode');
        }
    }

    public function updatedCompanySelect()
    {
        $this->companyOptions = $this->curSuggestions;
    }

    public function cancelEdit()
    {
        $this->edit = false;
    }


    public function AddAddressAttempt()
    {
        $data =  $this->validate([
            'address_select' => 'required',
        ]);

        $response = $this->getAddressListZipcodeExpand($this->zipcode);
        $selected_address = $response->addresses[$this->address_select];

        $formatted = '';
        foreach ($selected_address->formatted_address as $fra) {
            $formatted = $formatted . ' ' . $fra;
        }

        $address = Address::find($this->user->userdetail->address_id);
        $address->update([
            'postcode' => $response->postcode,
            'country' => $selected_address->country,
            'district' => $selected_address->district,
            'county' => $selected_address->county,
            'latitude' => $response->latitude,
            'longitude' => $response->longitude,
            'formatted_address' => $formatted,
        ]);


        $this->address = $address;
        $this->emit('succesAlert', 'Address Updated');
        $this->edit = false;
    }


    public function render()
    {
        return view('livewire.customer.user.address-form');
    }
}
