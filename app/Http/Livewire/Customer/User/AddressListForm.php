<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\Address;
use App\Models\User;
use App\Models\UserOffice;
use App\Traits\AddressHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Manny;

class AddressListForm extends Component
{
    use AddressHelper;
    public $name;
    public $surname;
    public $mobile;
    public $phone;
    public $email;
    public User $user;
    public Address $address;
    public $companyOptions;
    public $curSuggestions;
    public $zipcode;
    public $address_select;
    public $edit = false;
    public $office_name;
    public $addresses;
    public $main_office;


    public function mount()
    {
        $this->user = Auth::user();
        $this->edit = false;
        $this->companyOptions = collect([]);
        $this->curSuggestions = collect([]);
        $this->addresses = Auth::user()->useroffices;
        $this->main_office =  UserOffice::where('user_id', $this->user->id)->where('is_billing', 1)->first();
    }

    public function hydrate()
    {
        $this->companyOptions = $this->curSuggestions;
    }

    public function editAddress()
    {
        $this->edit = true;
    }

    public function updated($field)
    {
        if ($field == 'mobile') {
            //this is where we will detect any changes to the mobile field.
            $this->mobile = Manny::mask($this->mobile, "+111111111111");
        }
        if ($field == 'phone') {
            //this is where we will detect any changes to the mobile field.
            $this->phone = Manny::mask($this->phone, "+111111111111");
        }
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
            'email' => 'required|email',
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|min:13|max:13',
            'phone' => 'nullable|min:13|max:13',
            'address_select' => 'required',
            'office_name' => 'required|min:5|max:15',
        ]);

        $response = $this->getAddressListZipcodeExpand($this->zipcode);
        $selected_address = $response->addresses[$this->address_select];

        $formatted = '';
        foreach ($selected_address->formatted_address as $fra) {
            $formatted = $formatted . ' ' . $fra;
        }

        $address = Address::create([
            'postcode' => $response->postcode,
            'country' => $selected_address->country,
            'district' => $selected_address->district,
            'county' => $selected_address->county,
            'latitude' => $response->latitude,
            'longitude' => $response->longitude,
            'formatted_address' => $formatted,
        ]);

        UserOffice::create([
            'office_name' => $this->office_name,
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'user_id' => $this->user->id,
            'address_id' => $address->id,
            'is_shipping' => 0,
            'is_billing' => 0,
        ]);

        $this->emit('succesAlert', 'Address Added');
        $this->addresses = Auth::user()->useroffices;
    }

    public function deleteAddress($id)
    {
        $address = UserOffice::find($id);
        if (!$address->is_billing) {

            if ($address->is_shipping) {
                $this->main_office->update([
                    'is_shipping' => 1,
                ]);
            }

            $address->delete();
            $this->emit('succesAlert', 'Address Deleted');
            $this->addresses = Auth::user()->useroffices;
        }
    }

    public function defaultAddress($id)
    {
        $address = UserOffice::find($id);

        $other_address = UserOffice::where('user_id', $this->user->id)->get();
        foreach ($other_address as $other) {
            $other->update([
                'is_shipping' => 0,
            ]);
        }
        $address->update([
            'is_shipping' => 1,
        ]);
        $this->emit('succesAlert', 'Default Shipping Changed');
        $this->addresses = Auth::user()->useroffices;
    }

    public function render()
    {

        return view('livewire.customer.user.address-list-form', [
            'addresses' => $this->addresses
        ]);
    }
}
