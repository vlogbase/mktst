<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Country;
use App\Models\Seller;
use App\Models\SellerDetail;
use App\Rules\VatValidation;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Illuminate\Support\Str;
use Manny;

class CreateSeller extends Component
{
   
    public $phone;
    public $name;
    public $vat;
    public $registeration;
    public $email;
    public $address;
    public $password;
    public $password_confirmation;

    public $countries;
    public $companyOptions;

    public $code;

    public function mount()
    {
        $this->companyOptions = collect([]);
        $this->countries = Country::orderBy('phonecode', 'asc')->distinct('phonecode')->get(['phonecode']);
    }

    public function hydrate()
    {
        $this->countries = Country::orderBy('phonecode', 'asc')->distinct('phonecode')->get(['phonecode']);
    }

    public function registerAttempt()
    {
        $data =  $this->validate([
            'password' => ['required', 'string', Password::min(8)->mixedCase()
                ->letters()
                ->numbers(), 'confirmed'],
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:sellers,email',
            'code' => 'required|min:1|max:5',
            'phone' => 'nullable|min:10|max:10',
            'name' => 'required|min:5|max:160',
            'vat' => ['nullable', 'string', 'min:11', 'max:11', new VatValidation],
            'registeration' => 'nullable|min:8|max:30',
            'address' => 'required|min:5|max:160',
        ]);

        $seller = Seller::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        SellerDetail::create([
            'address' => $this->address,
            'phone' => $this->code . '-' . $this->phone,
            'vat_number' => $this->vat,
            'registry_code' => $this->registeration,
            'seller_id' => $seller->id,
        ]);

        return redirect()->route('admin.sellers.list');
    }

    public function render()
    {
        return view('livewire.admin.seller.create-seller');
    }
}
