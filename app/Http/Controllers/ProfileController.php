<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
            

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
            if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
                // Delete the old image if it exists
                $oldImage = $request->user()->profile_picture;
                if ($oldImage && file_exists(public_path('uploads/' . $oldImage))) {
                    unlink(public_path('uploads/' . $oldImage));
                }
    
                // Create a new file name
                $fileName = Str::slug($request->user()->name . '-' . $request) . '-' . time() . '.' . $request->pr->extension();
    
                // Move the uploaded image to the 'uploads' directory
                $request->profile_picture->move(public_path('uploads'), $fileName);
    
                // Update the user's image path
                $request->user()->profile_picture = $fileName;
            }
        }

       $user= $request->user()->update();
        dd($user);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
