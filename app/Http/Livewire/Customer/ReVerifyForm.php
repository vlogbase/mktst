<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use App\Notifications\VerifyNotification;
use Livewire\Component;

class ReVerifyForm extends Component
{
    public User $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function sendVerification()
    {
        if ($this->user->email_verified_at == NULL) {
            $registeredUser = [
                'userName' => $this->user->name,
                'actionURL' => config('app.url') . '/verify-email/' . $this->user->email . '/' . $this->user->verify_token
            ];

            $this->user->notify(new VerifyNotification($registeredUser));
            $this->emit('succesAlert', 'Sent Verification Successfully');
        } else {
            $this->emit('errorAlert', 'Your account has already been verified');
        }
    }

    public function render()
    {
        return view('livewire.customer.re-verify-form');
    }
}
