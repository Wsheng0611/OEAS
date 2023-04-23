<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    // Display the register view.
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     *
    */
    public function store(Request $request): RedirectResponse
    {
        // validation rules
        $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|string|max:50|regex:/^[\w]+@([\w-]+\.)+[\w-]{2,4}$/', // email should be unique
            'password' => 'required|confirmed', // Rules\Password::defaults() - min, mixed, number, symbol
        ]);

        // save into User DB
        $user = User::create([
            'role_id' => 1,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // email verification
        // event(new Registered($user));

        // log user in automatically
        // Auth::login($user);

        // Success --> back to homepage and display register success
        return redirect(RouteServiceProvider::HOME)->with('success', 'User created successfully!');
    }
}
