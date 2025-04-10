{{-- /resources/views/auth/login.blade.php --}}

@extends('layouts.guest') {{-- Use the guest layout --}}

{{-- Optional: Set a specific title for the login page --}}
@section('title', 'Sign In')

{{-- Inject the content into the 'content-card' section of the guest layout --}}
@section('content-card')

    {{-- Logo / App Name / Header --}}
    <div class="text-center mb-8"> {{-- Added margin-bottom for spacing --}}
        {{-- Optional Logo Link --}}
        {{-- <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500 mx-auto mb-4" />
        </a> --}}

        {{-- App Name (if no logo) --}}
        {{-- <h1 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white mb-4">
            {{ config('app.name', 'Laravel') }}
        </h1> --}}

        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            Sign in to your account
        </h2>

        {{-- Link to Register Page --}}
        @if (Route::has('register'))
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Or
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                    create a new account
                </a>
            </p>
        @endif
    </div>

    {{-- Session Status (e.g., for password reset success message) --}}
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 p-4 rounded-md border border-green-200 dark:border-green-600/30">
            {{ session('status') }}
        </div>
    @endif

    {{-- Login Form --}}
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
        @csrf

        {{-- Display General Login Errors (like invalid credentials) --}}
        {{-- This checks specifically for the 'auth.failed' message, often tied to the 'email' field by default --}}
        @error('email')
            @if ($message === \Illuminate\Support\Facades\Lang::get('auth.failed'))
                <div class="rounded-md bg-red-50 dark:bg-red-900/30 p-4 border border-red-200 dark:border-red-600/30">
                    <div class="flex">
                        <div class="flex-shrink-0">
                             <svg class="h-5 w-5 text-red-400 dark:text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                             </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800 dark:text-red-300">{{ $message }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @enderror

        {{-- Email Address --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email address</label>
            <div class="relative">
                 <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                      </svg>
                 </div>
                <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                       class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/20 dark:focus:ring-indigo-400/30 focus:outline-none @error('email') border-red-500 dark:border-red-600 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500/20 dark:focus:ring-red-600/30 @enderror">
            </div>
             {{-- Display specific email validation errors (but NOT the general 'auth.failed' message here) --}}
            @error('email')
                 @if ($message !== \Illuminate\Support\Facades\Lang::get('auth.failed'))
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                 @endif
            @enderror
        </div>

        {{-- Password --}}
        <div>
             <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
             <div class="relative">
                  <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 dark:text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                         <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2v-7a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                       </svg>
                  </div>
                 <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/20 dark:focus:ring-indigo-400/30 focus:outline-none @error('password') border-red-500 dark:border-red-600 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500/20 dark:focus:ring-red-600/30 @enderror">
             </div>
            @error('password')
                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember Me & Forgot Password --}}
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                {{-- Ensure @tailwindcss/forms plugin is installed for optimal styling --}}
                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 dark:bg-gray-700">
                <label for="remember" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">Remember me</label>
            </div>

            @if (Route::has('password.request'))
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Forgot your password?</a>
                </div>
            @endif
        </div>

        {{-- Submit Button --}}
        <div>
            <button type="submit" class="w-full inline-flex items-center justify-center rounded-lg border border-transparent bg-indigo-600 px-5 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                Sign in
            </button>
        </div>
    </form>

@endsection
