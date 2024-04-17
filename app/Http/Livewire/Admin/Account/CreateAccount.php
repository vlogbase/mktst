<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\Admin;
use App\Rules\VatValidation;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Illuminate\Support\Str;
use Manny;

class CreateAccount extends Component
{
   
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    

    public function mount()
    {
        //
    }

    public function hydrate()
    {
        //
    }

    public function registerAttempt()
    {
        $data =  $this->validate([
            'password' => ['required', 'string', Password::min(8)->mixedCase()
                ->letters()
                ->numbers(), 'confirmed'],
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:sellers,email',
        ]);

        Admin::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'is_master' => 1,
        ]);

        return redirect()->route('admin.accounts.list');
    }

    public function render()
    {
        return view('livewire.admin.account.create-account');
    }
}
