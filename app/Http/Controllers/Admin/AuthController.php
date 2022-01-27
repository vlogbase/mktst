<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function forget()
    {
        return view('admin.auth.forget');
    }

    public function reset($email, $token)
    {
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $email,
                'token' => $token
            ])
            ->first();
        if (!$updatePassword) {
            return redirect()->route('admin.login');
        }
        return view('admin.auth.reset', compact('email', 'token'));
    }
}
