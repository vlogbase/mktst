<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login()
    {
        return view('customer.auth.login');
    }

    public function register()
    {
        return view('customer.auth.register');
    }

    public function forget_password()
    {
        return view('customer.auth.forget-password');
    }

    public function reset_password($email, $token)
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $email,
                'token' => $token
            ])
            ->first();
        if (!$updatePassword) {
            return redirect()->route('login');
        }
        return view('customer.auth.reset-password', compact('email', 'token'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function resend_verify($token)
    {
        $user = User::where('code', $token)->firstOrFail();
        return view('customer.auth.resend-verify', compact('user'));
    }

    public function verify_email($email, $token)
    {

        $user = User::where('email', $email)->where('verify_token', $token)->firstOrFail();
        $user->update(
            [
                'verify_token' => NULL,
                'email_verified_at' => Carbon::now()
            ]
        );
        return view('customer.auth.verified', compact('user'));
    }
}
