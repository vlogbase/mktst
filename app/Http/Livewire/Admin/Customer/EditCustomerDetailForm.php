<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;

class EditCustomerDetailForm extends Component
{
    public $customer;

    public $name;
    public $vat;
    public $registeration;
    public $email;
    public $type;
    public $point;
    public $mobile;
    public $phone;


    public $email_verified_at;



    public function mount($customer)
    {
        $this->name = $customer->name;
        $this->vat = $customer->vat;
        $this->registeration = $customer->registeration;
        $this->email = $customer->email;
        $this->type = $customer->userdetail->business_type;
        $this->point = $customer->point;
        $this->email_verified_at = $customer->email_verified_at;
        $this->mobile = $customer->userdetail->mobile;
        $this->phone = $customer->userdetail->phone;
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'vat' => 'required',
            'registeration' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'type' => 'required',
            'point' => 'required',
            'mobile' => 'required',
            'phone' => 'nullable',
        ]);

        $this->customer->update([
            'name' => $this->name,
            'vat' => $this->vat,
            'registeration' => $this->registeration,
            'email' => $this->email,
            'point' => $this->point,
            'email_verified_at' => $this->email_verified_at
        ]);

        $this->customer->userdetail->update([
            'business_type' => $this->type,
            'mobile' => $this->mobile,
            'phone' => $this->phone
        ]);

        $this->emit('succesAlert', 'Updated!');
    }

    public function render()
    {
        return view('livewire.admin.customer.edit-customer-detail-form');
    }
}
