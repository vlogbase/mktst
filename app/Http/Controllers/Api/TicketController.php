<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends ApiController
{

    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())->take(10)->get();
        return $this->successResponse($tickets);
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'topic' => 'required',
            'urgency' => 'required',
            'ticket_message' => 'required',
        ]);

        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->topic = $request->topic;
        $ticket->urgency = $request->urgency;
        $ticket->user_id = auth()->user()->id;
        $ticket->status = 'Created';
        $ticket->save();

        $ticket_message = new TicketMessage();
        $ticket_message->ticket_id = $ticket->id;
        $ticket_message->message = $request->ticket_message;
        $ticket_message->author = 'customer';
        $ticket_message->save();


        return $this->successResponse($ticket, 'Ticket created successfully.');
    }

   
    public function show(Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) {
            return $this->errorResponse('You are not authorized to view this ticket.', 403);
        }

        $ticket->messages;
        
        return $this->successResponse($ticket);
    }

    
    public function update(Request $request, Ticket $ticket)
    {
        if ($ticket->user_id != auth()->id()) {
            return $this->errorResponse('You are not authorized to view this ticket.', 403);
        }
        
        $validated = $request->validate([
            'text_message' => 'required|max:255'
        ]);

        TicketMessage::create([
            'message' => $request->text_message,
            'author' => 'customer',
            'ticket_id' => $ticket->id,
        ]);

        $ticket->messages;

        return $this->successResponse($ticket);
    }
}