<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = [
        'title', 'description', 'status', 'priority', 'category',
        'created_by', 'assigned_to', 'closed_at'
    ];
// Relationship: Creator of the Ticket
public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}

// Relationship: Assigned Support Staff
public function assignee()
{
    return $this->belongsTo(User::class, 'assigned_to');
}


}
