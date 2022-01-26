<?php

namespace App\Http\Livewire\Customer;

use App\Models\Newsletter;
use Livewire\Component;
use Illuminate\Support\Str;

class NewsletterMain extends Component
{

    public $email;
    public function newsletterAttempt()
    {
        $data =  $this->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $this->email,
            'token' => Str::random(40),
        ]);
        $this->emit('succesAlert', 'Welcome to Our Newsletter!');
    }
    public function render()
    {
        return view('livewire.customer.newsletter-main');
    }
}
