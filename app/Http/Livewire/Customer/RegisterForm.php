<?php

namespace App\Http\Livewire\Customer;

use App\Models\Address;
use App\Models\Country;
use App\Models\Newsletter;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserOffice;
use App\Notifications\WelcomeNotification;
use App\Traits\AddressHelper;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Password;
use stdClass;
use Illuminate\Support\Str;
use Manny;
use PHPUnit\Framework\Constraint\Count;

class RegisterForm extends Component
{
    use AddressHelper;
    public $name;
    public $surname;
    public $mobile;
    public $phone;
    public $company_name;
    public $company_select;
    public $vat;
    public $registeration;
    public $email;
    public $password;
    public $password_confirmation;
    public $newsletter;
    public $agreement;

    public $companyOptions;
    public $curSuggestions;

    public $business_type;

    public $search_address_field = "";
    public $show_address_selection = false;
    public $manuallyAdressEnter = false;

    public $address_line_1;
    public $address_line_2;
    public $postcode;
    public $district;
    public $county;
    public $country;


    public $countries;
    public $countryNames;

    public $code;

    public function mount()
    {
        $this->companyOptions = collect([]);
        $this->curSuggestions = collect([]);
        $this->countries = Country::orderBy('phonecode', 'asc')->distinct('phonecode')->get(['phonecode']);
        $this->countryNames = Country::orderBy('name', 'asc')->get();
    }

    public function hydrate()
    {
        $this->companyOptions = $this->curSuggestions;
        $this->countries = Country::orderBy('phonecode', 'asc')->distinct('phonecode')->get(['phonecode']);
        $this->countryNames = Country::orderBy('name', 'asc')->get();
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
        if ($this->search_address_field != '') {
            $this->companyOptions = collect([]);
            $response = $this->getAddressList($this->search_address_field);
            foreach ($response->suggestions as $opt) {
                $opt = json_decode(json_encode($opt), true);
                $this->companyOptions->push($opt);
                $this->curSuggestions->push($opt);
            }
            if (count($this->companyOptions) > 0) {
                $this->show_address_selection = true;
            }
        } else {
            $this->show_address_selection = false;
            $this->addError('search_address_field', 'Please type your address');
            $this->emit('errorShow', 'Please type your address');
        }
    }

    public function updatedCompanySelect()
    {
        $this->companyOptions = $this->curSuggestions;
    }

    public function openManuallyAddress()
    {
        $this->manuallyAdressEnter = true;
    }


    public function registerAttempt()
    {
        $data =  $this->validate([
            'password' => ['required', 'string', Password::min(8)->mixedCase()
                ->letters()
                ->numbers(), 'confirmed'],
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'mobile' => 'required|min:10|max:10',
            'code' => 'required|min:1|max:5',
            'phone' => 'nullable|min:10|max:10',
            'company_name' => 'required|min:5|max:160',
            'vat' => 'nullable|min:5|max:15',
            'registeration' => 'nullable|min:8|max:30',
            'agreement' => 'required',
            'newsletter' =>  'nullable',
            'business_type' => 'required|min:2',
            'company_select' => !$this->manuallyAdressEnter ? 'required|min:10|max:200' : 'nullable',
            'address_line_1' => $this->manuallyAdressEnter ? 'required|min:5|max:150' : 'nullable',
            'address_line_2' => $this->manuallyAdressEnter ? 'nullable|min:5|max:150' : 'nullable',
            'postcode' => $this->manuallyAdressEnter ? 'required|min:3|max:200' : 'nullable',
            'district' => $this->manuallyAdressEnter ? 'nullable|min:2|max:200' : 'nullable',
            'county' => $this->manuallyAdressEnter ? 'nullable|min:2|max:200' : 'nullable',
            'country' => $this->manuallyAdressEnter ? 'required|min:5|max:200' : 'nullable',

        ]);

        if ($this->newsletter) {
            $newsletterUser = Newsletter::where('email', $this->email)->first();
            if ($newsletterUser) {
                $this->emit('errorShow', 'Already Newsletter Subscriber');
            } else {
                Newsletter::create([
                    'email' => $this->email,
                    'token' => Str::random(40),
                ]);
            }
        }

        $verify_token =  Str::random(64);
        $user = User::create([
            'name' => $this->company_name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'vat' => $this->vat,
            'registeration' => $this->registeration,
            'code' => 'SVY-' . Str::random(7),
            'verify_token' => $verify_token
        ]);

        if (!$this->manuallyAdressEnter) {
            //Adress
            $response = $this->getSelectedAddressDetail($this->company_select);

            $formatted = '';
            foreach ($response->formatted_address as $fra) {
                $formatted = $formatted . ' ' .  $fra;
            }

            $address = Address::create([
                'postcode' => $response->postcode,
                'country' => $response->country,
                'district' => $response->district,
                'county' => $response->county,
                'latitude' => $response->latitude,
                'longitude' => $response->longitude,
                'formatted_address' => $formatted,
            ]);
        }else{
            $address = Address::create([
                'postcode' => $this->postcode,
                'country' => $this->country,
                'district' => $this->district ? $this->district : '',
                'county' => $this->county ? $this->county : '',
                'latitude' => 0,
                'longitude' => 0,
                'formatted_address' => $this->address_line_1 . ' ' . $this->address_line_2 . ', ' . $this->district . ', ' . $this->county . ', ' . $this->postcode . ', '. $this->country,
            ]);
        }



        UserDetail::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' =>  $this->phone,
            'mobile' => $this->code . '-' .$this->mobile,
            'user_id' => $user->id,
            'address_id' => $address->id,
            'business_type' => $this->business_type
        ]);

        UserOffice::create([
            'office_name' => 'Main Office',
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'user_id' => $user->id,
            'address_id' => $address->id,
            'is_shipping' => 1,
            'is_billing' => 1,
        ]);

        $registeredUser = [
            'userName' => $this->company_name,
            'actionURL' => route('verify_email', ['email' => $this->email, 'token' => $verify_token])
        ];

        $user->notify(new WelcomeNotification($registeredUser));

        return redirect()->route('resend_verify', $user->code);
    }

    public function render()
    {
        return view('livewire.customer.register-form');
    }
}
