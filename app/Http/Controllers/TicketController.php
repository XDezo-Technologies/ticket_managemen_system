<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(){
        
    }
    Public function create(){
        return view('TicketManagementSystem.Ticket.Create');
    }
    public function store(Request $request){
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        //  dd(Auth::id());
        Tickets::create([
            'created_by'     => Auth::id(), 
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => 'open',
        ]);
        return redirect()->route('Ticket.create')->with('success', 'Ticket submitted successfully!');
    }
}
