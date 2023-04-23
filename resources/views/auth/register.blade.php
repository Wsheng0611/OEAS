<x-guest-layout>

    <!-- When form submit, send post request to route name = register -->
    <form method="POST" action="{{route('register')}}">

        <!-- Cross-Site Request Forgery - security token for HTTP Request -->
        @csrf
        
        <!-- Name -->
        <div>
            <!-- x = Blade Component -->
            <x-input-label for="username" :value="__('Username')" required/> 
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" placeholder="Enter username" required autofocus/>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email Address')" required/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Enter email address" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" required/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Enter new password" required/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" required/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Re-enter password" required/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>   





