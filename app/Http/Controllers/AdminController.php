<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    // public function Staff()
    // {
    //     // Fetch only users with the "support_staff" role
    //     $staff = User::where('role', 'support_staff')->get();

    //     // Return the view with staff data
    //     return view('admin.pages.staff.index', compact('staff'));
    // }
}
