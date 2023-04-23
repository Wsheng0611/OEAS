<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 
     * Get the validation rules that apply to the incoming request
     * 
     * @return array
     * 
     */
    public function rules(): array
    {
        // Define the validation rules for the request
        return [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ];
    }

    /**
     * 
     * Authenticate the user's credentials
     * 
     * @throws \Illuminate\Validation\ValidationException
     * 
     */
    public function authenticate()
    {
        if (Auth::guard('user')->attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // User is authenticated using the 'user' guard
            $user = Auth::guard('user')->user();
            // dd($user);
        } elseif (Auth::guard('admin')->attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            // Admin is authenticated using the 'admin' guard
            $admin = Auth::guard('admin')->user();
            // dd($admin);
        } 
        
        // else {
        //     // Authentication failed
        //     return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
        // }

        // Ensure the user is not rate-limited
        // $this->ensureIsNotRateLimited();

        // // Attempt to authenticate the user with their email and password
        // if (Auth::guard('user')->attempt($this->only('email', 'password'), $this->boolean('remember'))
        
        // ||
        
        // Auth::guard('admin')->attempt($this->only('email', 'password'), $this->boolean('remember'))
        
        
        // ){
        //     // dd(Auth::user());
        //     // Clear any previous rate limiter attempts
        //     RateLimiter::clear($this->throttleKey());
        // } else {
        //     // If authentication fails, hit the rate limiter and throw a validation exception
        //     RateLimiter::hit($this->throttleKey());

        //     throw ValidationException::withMessages([
        //         'email' => trans('auth.failed'),
        //     ]);
        // }
    }

    /**
     * 
     * Ensure the login request is not rate limited.
     * @throws \Illuminate\Validation\ValidationException
     * 
     */
    public function ensureIsNotRateLimited(): void
    {

        // Check if exceed 5 attempt or not
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        // If exceed, run below code
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('email')).'|'.$this->ip());
    }
}
