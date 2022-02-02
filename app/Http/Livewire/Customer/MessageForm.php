<?php

namespace App\Http\Livewire\Customer;

use App\Models\Admin;
use App\Models\AdminAlert;
use App\Models\Message;
use App\Notifications\NewMessage;
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
            'email' => 'required|email',
            'name' => 'required|min:2|max:50',
            'phone' => 'nullable|min:13|max:13',
            'subject' => 'nullable|max:50',
            'message' => 'required|min:10|max:1000',
        ]);

        Message::create($data);

        $adminAlerts = AdminAlert::where('message_alert', 1)->get();
        foreach ($adminAlerts as $adminalert) {
            $admin = $adminalert->admin;
            $registeredUser = [
                'userName' => $admin->name,
                'messageName' => $this->name,
                'messageEmail' => $this->email,
                'messagePhone' => $this->phone,
                'messageSubject' => $this->subject,
                'messageMessage' => $this->message,
            ];

            $admin->notify(new NewMessage($registeredUser));
        }


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
