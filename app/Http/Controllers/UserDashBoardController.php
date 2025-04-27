<?php

namespace App\Http\Controllers;
use App\Models\Tickets;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserDashBoardController extends Controller
{
    public function index()
{
    // Fetch tickets created by or assigned to the logged-in user
    $tickets = Tickets::where('created_by', auth()->id())
                    ->orWhere('assigned_to', auth()->id())
                    ->latest()
                    ->paginate(5);

    // Fetch only tickets created by the user for statistics
    $createTickets = Tickets::where('created_by', auth()->id())->get();

    $openTickets = $createTickets->where('status', 'open')->count();
    $closedTickets = $createTickets->where('status', 'closed')->count();
    $totalTickets = $createTickets->count();

    return view('User.index', compact('tickets', 'createTickets', 'openTickets', 'closedTickets', 'totalTickets'));
}

}
