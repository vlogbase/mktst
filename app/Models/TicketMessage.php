<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    
    public function humanTime()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }
}
