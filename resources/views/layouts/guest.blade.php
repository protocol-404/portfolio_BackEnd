<!DOCTYPE html>
{{-- Set language based on app locale --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- CSRF Token for AJAX requests and form security --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Title - defaults to app name, can be overridden by specific views using @section('title') --}}
        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        {{-- Using Figtree font commonly used in Laravel starters - adjust if needed --}}
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts and Styles -->
        {{-- Include compiled CSS and JS via Vite --}}
        {{-- Ensure these paths match your vite.config.js output --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Basic Dark Mode Handling -->
        {{-- This script runs early to set the 'dark' class on the <html> element
             based on localStorage or system preference, preventing FOUC (Flash of Unstyled Content) --}}
        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>

        {{-- Allow adding extra styles in the head from specific views --}}
        @stack('styles')
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- Main content area for guest pages --}}
        {{-- The light/dark background color (bg-gray-100 dark:bg-gray-900) is applied
             within the wrapper div in login.blade.php to allow full-screen colored backgrounds --}}
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

            {{-- Optional: Logo Link to Home --}}
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                 </a>
            </div> --}}

            {{-- The card/content from the specific view (e.g., login, register) gets yielded here --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                 @yield('content-card') {{-- Changed yield name for clarity --}}
            </div>

        </div>

        {{-- Allow adding scripts at the end of the body from specific views --}}
        @stack('scripts')
    </body>
</html>
