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
    public $vat;
    public $registeration;
    public $company_name;
    public $address;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $activation;

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
            'company_name' => 'required|min:5|max:160',
        ]);


        $sellerDetail = SellerDetail::create([
            'name' => $this->company_name,
            'address' => $this->address,
            'phone' => $this->code . '-' . $this->phone,
            'vat_number' => $this->vat,
            'registry_code' => $this->registeration,
            'active' => $this->activation ? 1 : 0,
           
        ]);

        Seller::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'seller_detail_id' => $sellerDetail->id,
            'is_master' => 1,
        ]);

        return redirect()->route('admin.sellers.list');
    }

    public function render()
    {
        return view('livewire.admin.seller.create-seller');
    }
}
