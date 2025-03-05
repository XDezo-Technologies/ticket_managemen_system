<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'profile_picture' => ['nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $fileName = null;
        if ($request->hasFile('image')) {
            $fileName = Str::slug($request->first_name) . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/'), $fileName);
        }
        $user = User::create([
            'name' => $request->name,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'email' => $request->email,
            'profile_picture' => $fileName,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(route('dashboard', absolute: false));
        return redirect('/');
    }
}
