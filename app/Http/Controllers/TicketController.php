<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tickets;
use App\Models\User;
use App\Models\File;
use App\Notifications\TicketCreatedNotification;
use App\Notifications\TicketUpdatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
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
    

    // Paginate the results
    $tickets = $query->orderBy('created_at', 'desc')->paginate(10);
    return view('TicketManagementSystem.Ticket.index', compact('tickets'));
    }
    
    Public function create(){
        return view('TicketManagementSystem.Ticket.Create');
    }
    public function store(Request $request){
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    =>'required|string',
        ]);
        //  dd(Auth::id());
        $ticket = Tickets::create([
            'created_by'     => Auth::id(), 
            'title'       => $request->title,
            'description' => $request->description,
            'category'    =>$request->category,
            'status'      => 'open',
        ]);
        Auth::user()->notify(new TicketCreatedNotification($ticket));
        return redirect()->route('Ticket.create')->with('success', 'Ticket submitted successfully!');
    }
    public function show($id){
        $ticket = Tickets::with(['creator', 'assignee', 'attachments', 'comments.user'])->findOrFail($id);
        $staff = User::where('role', 'support_staff')->get(); // Fetch only support staff
        $files = File::all(); // or however you fetch the files
        return view('TicketManagementSystem.Ticket.show', compact('ticket', 'staff','files'));
    }
   Public function Update(Request $request,$id){
    
   }
   public function addComment(Request $request, $ticketId)
   {
       $request->validate([
           'message' => 'required|string|max:1000',
       ]);
   
       Comment::create([
           'ticket_id' => $ticketId,
           'user_id' => auth()->id(),
           'message' => $request->content,
       ]);
   
       return back()->with('success', 'Comment added successfully.');
   }
}
