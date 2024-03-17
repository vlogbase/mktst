<?php

namespace App\Http\Livewire\Seller\Auth;

use App\Models\Seller;
use App\Notifications\ForgetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class Forget extends Component
{
    public $email;

    public function processAttempt()
    {
        $data =  $this->validate([
            'email' => 'required|email|min:2|exists:sellers,email',
        ]);

        $user = Seller::where('email', $this->email)->firstOrFail();

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $registeredUser = [
            'userName' => $user->name,
            'actionURL' => route('seller.reset', ['email' => $user->email, 'token' => $token])
        ];

        $user->notify(new ForgetPasswordNotification($registeredUser));
        $this->emit('succesAlert', 'Sent Reset Link Successfully');
    }

    public function render()
    {
        return view('livewire.seller.auth.forget');
    }
}
