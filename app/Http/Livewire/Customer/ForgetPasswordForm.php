<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\User;
use App\Notifications\ForgetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgetPasswordForm extends Component
{
    public $email;

    public function loginAttempt()
    {
        $data =  $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $this->email)->firstOrFail();

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $registeredUser = [
            'userName' => $user->name,
            'actionURL' => route('reset_password', ['email' => $user->email, 'token' => $token])
        ];

        $user->notify(new ForgetPasswordNotification($registeredUser));
        $this->emit('succesAlert', 'Sent Reset Link Successfully');
    }

    public function render()
    {
        return view('livewire.customer.forget-password-form');
    }
}
