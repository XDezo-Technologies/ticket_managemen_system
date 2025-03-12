<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tickets;


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
}
