<?php

namespace App\Http\Livewire\Customer;

use App\Models\Message;
use Livewire\Component;
use Manny;

class MessageForm extends Component
{
    public $email;
    public $name;
    public $phone;
    public $subject;
    public $message;

    public function messageAttempt()
    {
        $data =  $this->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|min:2|max:50',
            'phone' => 'nullable|min:13|max:13',
            'subject' => 'nullable|max:50',
            'message' => 'required|min:10|max:1000',
        ]);

        Message::create($data);
        $this->emit('succesAlert', 'Your Message Sent!');
    }

    public function updated($field)
    {

        if ($field == 'phone') {
            //this is where we will detect any changes to the mobile field.
            $this->phone = Manny::mask($this->phone, "+111111111111");
        }
    }

    public function render()
    {
        return view('livewire.customer.message-form');
    }
}
