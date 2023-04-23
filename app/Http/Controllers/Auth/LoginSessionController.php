<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginSessionController extends Controller
{
    /**
     * Handle an Login Request
     */
    public function login_create(LoginRequest $request): RedirectResponse
    {
        // validate input data
        $request->rules(); 

        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials) && !strpos($request->get('email'), 'neptune.com')) {
            // User is customer, redirect to user homepage
            $request->authenticate();
            $user = Auth::guard('user')->user();
            // dd($user);
            $request->session()->regenerate();
            // return redirect()->intended(RouteServiceProvider::HOME);

        } elseif (Auth::guard('admin')->attempt($credentials)) {
            // User is admin, redirect to admin dashboard
            // dd(Auth::guard('admin'));
            $admin = Auth::guard('admin')->user();
            $request->authenticate();
            // dd('bbb');
            // dd($admin);
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::ADMINHOME);
        
            // Add this line to fix the error
            return redirect()->back()->withInput($request->only('email'));
        } 
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('web')->logout();
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } 
        
        elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
    
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
