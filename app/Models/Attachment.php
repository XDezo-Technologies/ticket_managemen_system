<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'user_id', 'file_path'];

    public function ticket()
    {
        return $this->belongsTo(Tickets::class, 'ticket_id'); // Ensure the foreign key is correct
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
