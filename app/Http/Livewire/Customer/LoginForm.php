<?php

namespace App\Http\Livewire\Customer;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $rememberme;

    protected $rules = [
        'password' => 'required|min:6',
        'email' => 'required|email|min:2',
    ];

    public function loginAttempt()
    {
        try {
            $data =  $this->validate();
            if (Auth::attempt($data, $this->rememberme)) {
                request()->session()->regenerate();
                return redirect()->intended('/');
            } else {
                $this->emit('errorShow', 'Email or password is wrong!');
                return back();
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->emit('errorShow', 'Validation Error!');
            $this->validate();
        }
    }

    public function render()
    {
        return view('livewire.customer.login-form');
    }
}
