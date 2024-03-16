<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Country;
use App\Models\Seller;
use App\Models\SellerDetail;
use App\Rules\VatValidation;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class EditSeller extends Component
{
    public $phone;
    public $name;
    public $vat;
    public $registeration;
    public $email;
    public $address;

    public $countries;
    public $companyOptions;

    public $code;
    public $seller;

    public function mount($sellerId)
    {
        $this->seller = Seller::findOrFail($sellerId);
        $this->name = $this->seller->name;
        $this->email = $this->seller->email;
        $this->address = $this->seller->sellerDetail->address;
        $this->phone = explode('-', $this->seller->sellerDetail->phone)[1];
        $this->vat = $this->seller->sellerDetail->vat_number;
        $this->registeration = $this->seller->sellerDetail->registry_code;
        $this->code = explode('-', $this->seller->sellerDetail->phone)[0];
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
            'email' => 'required|email|unique:sellers,email,' . $this->seller->id,
            'code' => 'required|min:1|max:5',
            'phone' => 'nullable|min:10|max:10',
            'name' => 'required|min:5|max:160',
            'vat' => ['nullable', 'string', 'min:11', 'max:11', new VatValidation],
            'registeration' => 'nullable|min:8|max:30',
            'address' => 'required|min:5|max:160',
        ]);

        $this->seller->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->seller->sellerDetail->update([
            'address' => $this->address,
            'phone' => $this->code . '-' . $this->phone,
            'vat_number' => $this->vat,
            'registry_code' => $this->registeration,
        ]);

        return redirect()->route('admin.sellers.list');
    }
    public function render()
    {
        return view('livewire.admin.seller.edit-seller');
    }
}
