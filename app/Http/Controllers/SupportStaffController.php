<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SupportStaffController extends Controller
{
    public function index()
    {
        // Fetch only users with the "support_staff" role
        $staff = User::where('role', 'support_staff')->get();

        // Return the view with staff data
        return view('support_staff.index', compact('staff'));
    }
}
