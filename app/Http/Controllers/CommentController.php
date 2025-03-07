<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'ticket_id' => 'required|exists:tickets,id',
        'message' => 'required|string|max:500',
    ]);

    Comment::create([
        'ticket_id' => $request->ticket_id,
        'user_id' => auth()->id(),
        'message' => $request->message
    ]);

    return back()->with('success', 'Comment added successfully!');
}

}
