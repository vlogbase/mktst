<?php

namespace App\Http\Livewire\Customer\Ticket;

use App\Models\Ticket;
use App\Models\TicketMessage as ModelsTicketMessage;
use Livewire\Component;

class TicketMessage extends Component
{

    public $ticket;
    public $ticket_messages;
    public $text_message;
    public $author;

    public function mount($ticket_id,$author){
        $this->ticket = Ticket::findOrFail($ticket_id);
        $this->author = $author;
       $this->getItems();
    }

    public function getItems(){
        $this->ticket_messages = ModelsTicketMessage::where('ticket_id', $this->ticket->id)->orderBy('created_at','asc')->get();
    }

    public function submit()
    {

        $LastFiveMessageFromCustomer = ModelsTicketMessage::where('ticket_id', $this->ticket->id)->orderBy('created_at','desc')->limit(6)->get();
        if($LastFiveMessageFromCustomer->count() > 0){
            $count = 0;
            foreach($LastFiveMessageFromCustomer as $message){
                if($message->author == $this->author){
                    $count++;
                }
            }
        }

        if($count == 6){
            $this->emit('errorAlert', 'You have reached the maximum number of messages allowed, please wait for a response.');
            return;
        }
        
        $this->validate([
            'text_message' => 'required'
        ]);

        ModelsTicketMessage::create([
            'message' => $this->text_message,
            'author' => $this->author,
            'ticket_id' => $this->ticket->id
        ]);

        $this->getItems();
    }



    public function render()
    {
        return view('livewire.customer.ticket.ticket-message',[
            'ticket' => $this->ticket,
            'messages' => $this->ticket_messages
        ]);
    }
}
