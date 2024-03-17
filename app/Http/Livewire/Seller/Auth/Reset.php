<?php

namespace App\Http\Livewire\Seller\Auth;

use App\Models\Seller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Reset extends Component
{
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    public function processAttempt()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'password' => ['required', 'string', Password::min(8)->mixedCase()
                ->letters()
                ->numbers(), 'confirmed'],
            'password_confirmation' => 'required|same:password',
            'token' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $this->email,
                'token' => $this->token
            ])
            ->first();

        if (!$updatePassword) {
            return redirect()->route('admin.login');
        }

        $user = Seller::where('email', $this->email)->first();
        $user->update(['password' => Hash::make($this->password)]);

        DB::table('password_resets')->where(['email' => $this->email])->delete();

        return redirect()->route('seller.login');
    }
    public function render()
    {
        return view('livewire.seller.auth.reset');
    }
}
