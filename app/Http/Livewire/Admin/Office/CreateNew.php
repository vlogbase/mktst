<?php

namespace App\Http\Livewire\Admin\Office;

use App\Models\Address;
use App\Models\Country;
use App\Models\User;
use App\Models\UserOffice;
use App\Traits\AddressHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Manny;

class CreateNew extends Component
{
    public $customer;

    use AddressHelper;
    public $name;
    public $surname;
    public $mobile;
    public $phone;
    public $email;
    public Address $address;
    public $companyOptions;
    public $curSuggestions;
    public $zipcode;
    public $address_select;
    public $edit = false;
    public $office_name;
    public $addresses;
    public $main_office;

    public $address_line_1;
    public $address_line_2;
    public $postcode;
    public $district;
    public $county;
    public $country;

    public $countries;
    public $countryNames;

    public $manuallyAdressEnter = false;
    public $code;

    public function mount($customer)
    {
        $this->customer = $customer;
        $this->companyOptions = collect([]);
        $this->curSuggestions = collect([]);
        $this->addresses = Auth::user()->useroffices;
        $this->main_office =  UserOffice::where('user_id', $this->customer->id)->where('is_billing', 1)->first();
        $this->countryNames = Country::orderBy('name', 'asc')->get();
        $this->countries = Country::orderBy('phonecode', 'asc')->distinct('phonecode')->get(['phonecode']);
    }

    public function hydrate()
    {
        $this->companyOptions = $this->curSuggestions;
        $this->countryNames = Country::orderBy('name', 'asc')->get();
        $this->countries = Country::orderBy('phonecode', 'asc')->distinct('phonecode')->get(['phonecode']);
    }

    public function openManuallyAddress()
    {
        $this->manuallyAdressEnter = true;
    }

    public function updated($field)
    {
        if ($field == 'mobile') {
            //this is where we will detect any changes to the mobile field.
            $this->mobile = Manny::mask($this->mobile, "1111111111");
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

    public function AddAddressAttempt()
    {
        $data =  $this->validate([
            'email' => 'required|email',
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|min:10|max:10',
            'code' => 'required|min:1|max:5',
            'phone' => 'nullable|min:13|max:13',
            'office_name' => 'required|min:5|max:15',
            'address_select' => !$this->manuallyAdressEnter ? 'required' : 'nullable',
            'address_line_1' => $this->manuallyAdressEnter ? 'required|min:5|max:150' : 'nullable',
            'address_line_2' => $this->manuallyAdressEnter ? 'nullable|min:5|max:150' : 'nullable',
            'postcode' => $this->manuallyAdressEnter ? 'required|min:3|max:200' : 'nullable',
            'district' => $this->manuallyAdressEnter ? 'nullable|min:2|max:200' : 'nullable',
            'county' => $this->manuallyAdressEnter ? 'nullable|min:2|max:200' : 'nullable',
            'country' => $this->manuallyAdressEnter ? 'required|min:5|max:200' : 'nullable',
        ]);

        if (!$this->manuallyAdressEnter) {
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
        } else {
            $address = Address::create([
                'postcode' => $this->postcode,
                'country' => $this->country,
                'district' => $this->district,
                'county' => $this->county,
                'latitude' => 0,
                'longitude' => 0,
                'formatted_address' => $this->address_line_1 . ' ' . $this->address_line_2 . ', ' . $this->district . ', ' . $this->county . ', ' . $this->postcode . ', '. $this->country,
            ]);
        }

        UserOffice::create([
            'office_name' => $this->office_name,
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'mobile' => $this->code . '-' .$this->mobile,
            'user_id' => $this->customer->id,
            'address_id' => $address->id,
            'is_shipping' => 0,
            'is_billing' => 0,
        ]);

        $this->emit('succesAlert', 'Address Added');
        return redirect()->route('admin.customers.detail', $this->customer->id);
    }


    public function render()
    {
        return view('livewire.admin.office.create-new');
    }
}
