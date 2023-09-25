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
    public $password;
    public $email_verified_at;


    public $user_name;
    public $user_surname;
    public $phone;
    public $mobile;
    public $type;

    public $point;

    public function mount($customer)
    {
        $this->name = $customer->name;
    }

    public function render()
    {

        return view('livewire.admin.customer.edit-customer-detail-form');
    }
}
