<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    public function humanTime()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function lastMessage()
    {
        return $this->messages()->latest()->first();
    }

    public function urgencyText()
    {
        if($this->urgency == 'high'){
            return '<span class="text-danger">High</span>';
        }elseif($this->urgency == 'medium'){
            return '<span class="text-warning">Middle</span>';
        }elseif($this->urgency == 'low'){
            return '<span class="text-success">Low</span>';
        }
    }
}
