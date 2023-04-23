<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Set App Name: in .env -->
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- JQuery -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- CSS --> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.bunny.net" rel="preconnect">      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" href="{{ asset('css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

        <!-- Load app.js and app.css in resources -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="/path/to/tailwind-ui.min.css">


        {{-- <link href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" rel="stylesheet"/>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script> --}}
    </head>
    
    <body>
        <x-header />

        <!-- slot is content pass to component/layout -->
        {{$slot}}

        {{-- <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full max-w-2xl mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}
    </body>
    {{-- @yield('scripts') --}}
</html>

