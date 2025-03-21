<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TicketUpdatedNotification;
use App\Models\Tickets;
use App\Models\File;



class StaffTicketController extends Controller
{
    public function index(Request $request){
        $query = Tickets::with(['creator', 'assignee']);

        // Filter by Status
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }
    
        // Filter by Priority
        if ($request->has('priority') && !empty($request->priority)) {
            $query->where('priority', $request->priority);
        }
            $query->where('created_by', auth()->id());
        
    
        
        $tickets = Tickets::where('assigned_to', Auth::id())->get();
        // Return the view with staff data
        return view('Support_Staff.Ticket.index', compact('tickets'));
    }

    public function show($id){
        $ticket = Tickets::with(['creator', 'assignee', 'attachments', 'comments.user'])->findOrFail($id);
        $staff = User::where('role', 'support_staff')->get(); // Fetch only support staff
        $files = File::all(); // or however you fetch the files
        return view('Support_Staff.Ticket.show', compact('ticket', 'staff','files'));
    }
    public function update(Request $request,$id){
       
        $request->validate([
            'status' => 'required|in:open,in_progress,resolved',
        ]);
    
        $ticket = Tickets::findOrFail($id);
    
        $ticket->update(['status' => $request->status]);
    
        
        $creator = User::find($ticket->created_by); 

        if ($creator) {
            $creator->notify(new TicketUpdatedNotification($ticket));
        } else {
            \Log::warning("User with ID {$ticket->created_by} not found. Notification not sent.");
        }
        return redirect()->back()->with('success', 'Ticket updated successfully.');
    }
}
