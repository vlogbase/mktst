<?php

namespace App\Http\Livewire\Customer\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class TicketList extends Component
{
    public $tickets;

    public function mount(){
        $this->tickets = Ticket::where('user_id', auth()->user()->id)->latest()->get();
    }

    public function render()
    {
        return view('livewire.customer.ticket.ticket-list',['tickets' => $this->tickets]);
    }
}
