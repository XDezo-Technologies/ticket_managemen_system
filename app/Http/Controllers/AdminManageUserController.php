<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUserController extends Controller
{
    public function index()
    {
        // Fetch only users with the "support_staff" role
        $user = User::where('role', 'user')->get();

        // Return the view with staff data
        return view('admin.pages.user.index', compact('user'));
    }
}
