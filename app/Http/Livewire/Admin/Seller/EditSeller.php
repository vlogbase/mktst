<?php

namespace App\Http\Livewire\Admin\Seller;

use App\Models\Brand;
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
    public $address;
    public $activation;

    public $countries;
    public $companyOptions;

    public $code;
    public $seller;
    public $brands;
    public $brand_select = [];

    public function mount($sellerId)
    {
        $this->brands = Brand::all();
        $this->seller = SellerDetail::findOrFail($sellerId);
        $this->brand_select = $this->seller->brands->pluck('id')->toArray();
        $this->name = $this->seller->name;
        $this->address = $this->seller->address;
        $this->phone = explode('-', $this->seller->phone)[1];
        $this->vat = $this->seller->vat_number;
        $this->activation = $this->seller->active;
        $this->registeration = $this->seller->registry_code;
        $this->code = explode('-', $this->seller->phone)[0];
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
            'code' => 'required|min:1|max:5',
            'phone' => 'nullable|min:10|max:10',
            'name' => 'required|min:5|max:160',
            'vat' => ['nullable', 'string', 'min:11', 'max:11', new VatValidation],
            'registeration' => 'nullable|min:8|max:30',
            'address' => 'required|min:5|max:160',
            'brand_select' => 'nullable'
        ]);

        $this->seller->update([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->code . '-' . $this->phone,
            'vat_number' => $this->vat,
            'registry_code' => $this->registeration,
            'active' => $this->activation ? 1 : 0,
        ]);

        

        foreach($this->brand_select as $brand){
            Brand::where('id', $brand)->update(['seller_detail_id' => $this->seller->id]);
        }

        //Delete Others
        Brand::where('seller_detail_id', $this->seller->id)->whereNotIn('id', $this->brand_select)->update(['seller_detail_id' => null]);


        $this->emit('succesAlert', 'Updated!');
    }
    public function render()
    {
        return view('livewire.admin.seller.edit-seller');
    }
}
