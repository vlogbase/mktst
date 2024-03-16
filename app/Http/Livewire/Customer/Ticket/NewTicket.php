<?php

namespace App\Http\Livewire\Customer\Ticket;

use App\Models\Ticket;
use App\Models\TicketMessage;
use Livewire\Component;

class NewTicket extends Component
{
    public $title;
    public $description;
    public $topic;
    public $urgency;
    public $ticket_message;

    public function submit(){
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'topic' => 'required',
            'urgency' => 'required',
            'ticket_message' => 'required',
        ]);

        $ticket = new Ticket();
        $ticket->title = $this->title;
        $ticket->description = $this->description;
        $ticket->topic = $this->topic;
        $ticket->urgency = $this->urgency;
        $ticket->user_id = auth()->user()->id;
        $ticket->status = 'Created';
        $ticket->save();

        $ticket_message = new TicketMessage();
        $ticket_message->ticket_id = $ticket->id;
        $ticket_message->message = $this->ticket_message;
        $ticket_message->author = 'customer';
        $ticket_message->save();




        session()->flash('message', 'Ticket successfully created.');
        return redirect()->to('/user/tickets/detail/'.$ticket->id);

    }


    public function render()
    {
        return view('livewire.customer.ticket.new-ticket');
    }
}
