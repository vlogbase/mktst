<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;

class EditPassword extends Component
{

    public $customer;

    public $password;
    public $password_confirmation;

    public function mount($customer)
    {
        $this->customer = $customer;
    }

    public function submit()
    {
        $this->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $this->customer->update([
            'password' => bcrypt($this->password)
        ]);

        $this->password = '';
        $this->password_confirmation = '';
        $this->emit('succesAlert', 'Updated Password!');
    }

    public function render()
    {
        return view('livewire.admin.customer.edit-password');
    }
}
