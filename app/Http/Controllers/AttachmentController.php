<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'ticket_id' => 'required|exists:tickets,id',
        'file' => 'required|file|mimes:jpg,png,pdf,docx|max:2048'
    ]);

    $filePath = $request->file('file')->store('attachments', 'public');

    Attachment::create([
        'ticket_id' => $request->ticket_id,
        'user_id' => auth()->id(),
        'file_path' => $filePath
    ]);

    return back()->with('success', 'Attachment uploaded successfully!');
}

}
