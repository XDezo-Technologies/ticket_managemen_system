<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tickets;

class AdminManagedStaffController extends Controller
{
    public function index()
    {
        // Fetch only users with the "support_staff" role
        $staff = User::where('role', 'support_staff')->get();

        // Return the view with staff data
        return view('admin.pages.staff.index', compact('staff'));
    }
    public function show($id)
    {
        // Find the staff member by ID
        $staff = User::where('role', 'support_staff')->findOrFail($id);
    
        // Retrieve all tickets assigned to this staff member
        $tickets = $staff->tickets; // Assuming the relationship is defined in the User model
    
        return view('admin.pages.staff.show', compact('staff', 'tickets'));
    }

    
}
