<?php

namespace App\Http\Livewire\Customer;

use App\Models\Address;
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



    public function mount()
    {
        $this->companyOptions = collect([]);
        $this->curSuggestions = collect([]);
    }

    public function hydrate()
    {
        $this->companyOptions = $this->curSuggestions;
    }

    public function findAddress()
    {
        if ($this->company_name != '') {
            $this->companyOptions = collect([]);
            $response = $this->getAddressList($this->company_name);
            foreach ($response->suggestions as $opt) {
                $opt = json_decode(json_encode($opt), true);
                $this->companyOptions->push($opt);
                $this->curSuggestions->push($opt);
            }
        } else {
            $this->addError('company_name', 'Please type your company name');
            $this->emit('errorShow', 'Please type your company name');
        }
    }

    public function updatedCompanySelect()
    {
        $this->companyOptions = $this->curSuggestions;
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
            'mobile' => 'required|min:17|max:17',
            'phone' => 'nullable|min:17|max:17',
            'company_name' => 'required|min:5|max:160',
            'company_select' => 'required|min:10|max:200',
            'vat' => 'nullable|min:5|max:15',
            'registeration' => 'nullable|min:10|max:30',
            'agreement' => 'required',
            'newsletter' =>  'nullable',
            'business_type' => 'required'
        ]);

        if ($this->newsletter) {
            $newsletterUser = Newsletter::where('email', $this->email)->first();
            if ($newsletterUser) {
                $this->emit('errorShow', 'Already Newsletter Subscriber');
            } else {
                Newsletter::create([
                    'email' => $this->email,
                    'token' => Str::random(15),
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

        //Adress
        $response = $this->getSelectedAddressDetail($this->company_select);

        $formatted = '';
        foreach ($response->formatted_address as $fra) {
            $formatted = $formatted . $fra;
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

        UserDetail::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'user_id' => $user->id,
            'address_id' => $address->id,
        ]);

        UserOffice::create([
            'office_name' => 'Registered Office',
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

        return redirect()->intended('/');
    }



    public function render()
    {
        return view('livewire.customer.register-form');
    }
}
