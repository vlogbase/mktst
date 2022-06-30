<?php

namespace App\Http\Livewire\Customer\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteUser extends Component
{
    protected $listeners = [
        'processDone' => 'eventOkay',
    ];

    public function deleteUser()
    {
        $this->emit('interactUser', 'Are you sure delete your account?');
    }

    public function eventOkay()
    {
        $user = Auth::user();
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        User::find($user->id)->delete();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.customer.user.delete-user');
    }
}
