<!-- Shared Layout for Guest/Customer -->
<x-guest-layout>

<!-- Session Status - check status set in session -->
<x-auth-session-status :status="session('status')" />

<div class="account-banner">
    <h1>MY ACCOUNT</h1>
</div>

<div class="container">      
    <div class="row align-items-start">
        <div class="site-content col-lg-12 col-12 col-md-12">
            <div class="login-page">
                <div class="row" id="user_login">
                <!-- Login Form beigns here -->
                <div class="col-12 col-md-6 col-login">
                    <h2 class="login-title">Login</h2>  
                
                    <form method="POST" action="{{route('login')}}">
                        @csrf

                        <!-- Email Address -->
                        <div class="aa">
                            <x-input-label id="email-label" for="email" :value="__('Email Address')" required/>
                            <x-text-input id="email" class="form-control ma" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="aa">
                            <x-input-label id="password-label" for="password" :value="__('Password')" required/>
                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Login Button -->
                        <div class="aa">
                            <button class="bb">Login</button>
                        </div>

                        <!-- Remember Me and Forgot Password -->
                        <div class="login-form-footer">

                            @if (Route::has('password.request'))
                                <a class="lost-password" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            
                            <label class="label-remember-me">
                                <input id="remember_me" type="checkbox" name="remember" value="forever">
                                <span>{{ __('Remember me') }}</span>
                            </label>
                        </div>
                
                        <div class="cc">
                            <span>Or Login With</span>
                        </div>

                        <div class="social-media-login">
                            <a href="#" class="login-fb btn">
                                <img src="{{asset('images/facebook_icon.png')}}" alt="Login with Facebook">
                                Google
                            </a>
                            <a href="#" class="login-gl btn">
                                <img src="{{asset('images/google_icon.png')}}" alt="Login with Google">
                                Google
                            </a>
                        </div>
                    </form>
                </div>
                
                <!-- Click to Register -->
                <div class="col-12 col-md-6 col-register">
                    <h2 class="register-title">Register</h2>  
                    
                    <div class="registration-info">
                        Registering for Neptune Electrical Appliances site allows you to 
                        purchase our quality product. Just fill in the fields below, 
                        and we’ll get a new account set up for you in no time. 
                        We will only ask you for information necessary to make the register process faster and easier.
                    </div>

                    <div class="aa" style="text-align: center;">
                        <a href="{{route('register_account')}}" class="register-btn">Register</a>
                    </div>
                </div>
                </div>
            </div>
        </div>  
    </div>
</div>

</x-guest-layout>