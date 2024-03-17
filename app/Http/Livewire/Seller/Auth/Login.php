<?php

namespace App\Http\Livewire\Seller\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function loginAttempt()
    {

        $data =  $this->validate([
            'password' => 'required|min:6',
            'email' => 'required|email|min:2',
        ]);
        if (Auth::guard('seller')->attempt($data)) {
            request()->session()->regenerate();
            return redirect()->intended('/seller');
        } else {
            $this->emit('errorAlert', 'Email or password is wrong!');
            return back();
        }
    }
    public function render()
    {
        return view('livewire.seller.auth.login');
    }
}
