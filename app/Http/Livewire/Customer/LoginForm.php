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
                $user = Auth::user();
                if ($user->email_verified_at != NULL) {
                    request()->session()->regenerate();
                    return redirect()->intended('/');
                } else {
                    Auth::logout();
                    session()->invalidate();
                    session()->regenerateToken();
                    return redirect()->route('resend_verify', $user->code);
                }
            } else {

                $this->emit('errorAlert', 'Email or password is wrong!');
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
