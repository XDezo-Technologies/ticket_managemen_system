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
    $staff = User::where('role', 'support_staff')->get(); // Get only staff members

    return view('admin.Pages.Ticket.show', compact('ticket', 'staff'));
}
Public function Update(Request $request,$id){
    $request->validate([
        'status' => 'required|in:open,in_progress,resolved,closed',
        'assigned_to' => 'nullable|exists:users,id',
    ]);

    $ticket = Tickets::findOrFail($id);

    $ticket->status = $request->status;
    $ticket->assigned_to = $request->assigned_to;
    $ticket->save();
    return redirect()->back()->with('success', 'Ticket updated successfully.');
}
public function destroy($id){
    $ticket = Tickets::findOrFail($id); // Find the ticket by ID
    $ticket->delete(); // Delete the ticket

    return redirect()->route('AdminTicket.index')->with('success', 'Ticket deleted successfully!');
}

}
