<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
{
    $tickets = Tickets::with(['creator', 'assignee'])->orderBy('created_at', 'desc')->get();
    return view('admin.Pages.Ticket.index', compact('tickets'));
}
    public function show($id)
{
    $ticket = Tickets::findOrFail($id);
    $supportStaff = User::where('role', 'support_staff')->get(); // Get only staff members

    return view('admin.Pages.Ticket.show', compact('ticket', 'supportStaff'));
}
}
