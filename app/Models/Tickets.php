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
}
