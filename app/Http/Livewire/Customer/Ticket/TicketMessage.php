<?php

namespace App\Http\Livewire\Customer\Ticket;

use App\Models\Ticket;
use App\Models\TicketMessage as ModelsTicketMessage;
use Livewire\Component;
use Livewire\WithFileUploads;

class TicketMessage extends Component
{

    use WithFileUploads;
    public $ticket;
    public $ticket_messages;
    public $text_message;
    public $author;
    public $file;

    public function mount($ticket_id, $author)
    {
        $this->ticket = Ticket::findOrFail($ticket_id);
        $this->author = $author;
        $this->getItems();
    }

    public function getItems()
    {
        $this->ticket_messages = ModelsTicketMessage::where('ticket_id', $this->ticket->id)->orderBy('created_at', 'asc')->get();
    }

    public function submit()
    {

        if ($this->author === 'customer') {
            $LastFiveMessageFromCustomer = ModelsTicketMessage::where('ticket_id', $this->ticket->id)->orderBy('created_at', 'desc')->limit(6)->get();
            if ($LastFiveMessageFromCustomer->count() > 0) {
                $count = 0;
                foreach ($LastFiveMessageFromCustomer as $message) {
                    if ($message->author == $this->author) {
                        $count++;
                    }
                }
            }

            if ($count == 3) {
                $this->emit('errorAlert', 'You have reached the maximum number of messages allowed, please wait for a response.');
                return;
            }
        }


        $this->validate([
            'text_message' => 'required'
        ]);

        if ($this->file) {
            $this->validate([
                'file' => 'max:1024', // 1MB Max
            ]);
            $file_path = $this->file->store('upload/ticket_files', 'public');
        } else {
            $file_path = null;
        }

        ModelsTicketMessage::create([
            'message' => $this->text_message,
            'author' => $this->author,
            'ticket_id' => $this->ticket->id,
            'file' => $file_path
        ]);

        $this->file = null;
        $this->getItems();
    }

    public function changeTicketStatus($status)
    {
        $this->ticket->update([
            'status' => $status
        ]);

        $this->emit('successAlert', 'Ticket status updated successfully');
        return redirect()->route('admin.contents.other.tickets.detail', ['id' => $this->ticket->id]);
    }

    public function render()
    {
        return view('livewire.customer.ticket.ticket-message', [
            'ticket' => $this->ticket,
            'messages' => $this->ticket_messages
        ]);
    }
}
