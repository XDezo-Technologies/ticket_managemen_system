<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class SupportStaffController extends Controller
{
   
    public function index()
        {
            $assignedTickets = Tickets::where('assigned_to', Auth::id())->get();
            $openTickets = $assignedTickets->where('status', 'open')->count();
            $closedTickets = $assignedTickets->where('status', 'closed')->count();
            $totalTickets = $assignedTickets->count();
            return view('support_Staff.index', compact('assignedTickets','openTickets','closedTickets','totalTickets'));
        }
        
}
