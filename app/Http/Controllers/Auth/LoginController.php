<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display Login View
     */
    public function show_LoginForm()
    {
        return view('auth.login');
    }

    /**
     * Login with Website Account - LoginSessionController (using session)
     */
    
    // OAuth for Google / FB Account
}
