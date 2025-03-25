<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;

class IndexController extends Controller
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
    

        $tickets = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('TicketManagementSystem.index' , compact('tickets'));
    }
}
