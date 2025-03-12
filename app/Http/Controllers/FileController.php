<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as Files;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $files = File::query()->where('user_id', $id)->paginate(10);
        return view('TicketManagementSystem.Files.index', compact('files'));
    }
    public function create()
    {
        return view('TicketManagementSystem.Files.create');
    }
    public function store(Request $request)
    {
        // dd($request);
        $file = new File;
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:3072',
            'title' => 'required|max:100'
        ]);
        $fileName = Str::slug($request->title) . '-' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/'), $fileName);
        $file->image = $fileName;
        $file->title = $request->title;
        $file->user_id = Auth::user()->id;
        $file->save();
        return redirect('/file')->with('message', 'uploaded Succesfully');
    }
   
    public function edit($id)
    {
        $file = File::query()->where('id', $id)->get()->first();
        return view('TicketManagementSystem.Files.edit', compact('file'));
    }
    public function update(Request $request, $id)
    {
        $file = File::query()->where('id', $id)->get()->first();
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required|max:100'
        ]);
        if ($request->image != "") {
            $fileName = Str::slug($request->title) . '-' . time() . '.' . $request->image->extension();
            Files::delete(public_path('uploads/' . $file->image));
            $request->image->move(public_path('uploads/'), $fileName);
            $file->image = $fileName;
        }
        $file->title = $request->title;
        $file->user_id = Auth::user()->id;
        $file->update();
        return redirect('file')->with('message', 'uploaded Succesfully');
    }
    public function destroy($id)
    {
        $file = File::query()->where('id', $id)->get()->first();
        Files::delete(public_path('uploads/' . $file->image));
        $file->delete();
        return redirect('file')->with('message', 'Deleted Successfully');
    }
}
