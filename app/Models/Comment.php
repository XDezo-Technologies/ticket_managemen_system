<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'user_id', 'message'];

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'ticket_id'); // Ensure the foreign key is correct
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
