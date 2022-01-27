<?php

namespace App\Http\Livewire\Admin\Auth;

use App\Models\Admin;
use App\Notifications\ForgetPasswordNotification;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgetPasswordForm extends Component
{
    public $email;

    public function processAttempt()
    {
        $data =  $this->validate([
            'email' => 'required|email|min:2|exists:admins,email',
        ]);

        $user = Admin::where('email', $this->email)->firstOrFail();

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $registeredUser = [
            'userName' => $user->name,
            'actionURL' => route('admin.reset', ['email' => $user->email, 'token' => $token])
        ];

        $user->notify(new ForgetPasswordNotification($registeredUser));
        $this->emit('succesAlert', 'Sent Reset Link Successfully');
    }

    public function render()
    {
        return view('livewire.admin.auth.forget-password-form');
    }
}
