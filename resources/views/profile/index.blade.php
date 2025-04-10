@extends('layouts.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Profile</h1>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your personal information and portfolio details</p>
</div>

@if(isset($profile) && $profile)
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Profile Summary Card -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">Profile Summary</h2>
            </div>
            <div class="p-6 flex flex-col items-center">
                @if($profile->avatar)
                    <div class="h-32 w-32 rounded-full overflow-hidden mb-4 border-4 border-purple-100 dark:border-purple-900">
                        <img src="{{ asset('storage/' . $profile->avatar) }}" alt="{{ $profile->full_name }}" class="h-full w-full object-cover">
                    </div>
                @else
                    <div class="h-32 w-32 rounded-full flex items-center justify-center bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 mb-4">
                        <svg class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                @endif
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $profile->full_name }}</h3>
                <p class="text-purple-600 dark:text-purple-400 font-medium mt-1">{{ $profile->title }}</p>
                
                <div class="mt-6 w-full">
                    <div class="flex items-center py-2 border-b border-gray-200 dark:border-gray-700">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $profile->email }}</span>
                    </div>
                    <div class="flex items-center py-2 border-b border-gray-200 dark:border-gray-700">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $profile->phone }}</span>
                    </div>
                    <div class="flex items-center py-2">
                        <svg class="h-5 w-5 text-gray-500 dark:text-gray-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-sm text-gray-600 dark:text-gray-300">{{ $profile->location }}</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 dark:bg-gray-700/50 px-6 py-4">
                <a href="{{ route('profile.edit', $profile) }}" class="inline-flex items-center text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Bio & Details -->
        <div class="md:col-span-2 bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-medium text-gray-900 dark:text-white">About Me</h2>
            </div>
            <div class="p-6">
                <div class="prose prose-sm max-w-none dark:prose-invert dark:text-gray-300">
                    {!! nl2br(e($profile->bio)) !!}
                </div>
                
                @if($profile->resume)
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-md font-medium text-gray-900 dark:text-white mb-3">Resume</h3>
                    <a href="{{ asset('storage/' . $profile->resume) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 dark:focus:ring-offset-gray-800">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download Resume
                    </a>
                </div>
                @endif
                
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-md font-medium text-gray-900 dark:text-white mb-3">Social Links</h3>
                    <div class="flex flex-wrap gap-2">
                        @if($profile->github)
                            <a href="{{ $profile->github }}" target="_blank" class="inline-flex items-center px-3 py-1.5 bg-gray-100 dark:bg-gray-700 rounded-full text-sm text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">
                                <i class="fab fa-github mr-2"></i> GitHub
                            </a>
                        @endif
                        
                        @if($profile->linkedin)
                            <a href="{{ $profile->linkedin }}" target="_blank" class="inline-flex items-center px-3 py-1.5 bg-blue-100 dark:bg-blue-900/30 rounded-full text-sm text-blue-800 dark:text-blue-200 hover:bg-blue-200 dark:hover:bg-blue-800/30">
                                <i class="fab fa-linkedin mr-2"></i> LinkedIn
                            </a>
                        @endif
                        
                        @if($profile->twitter)
                            <a href="{{ $profile->twitter }}" target="_blank" class="inline-flex items-center px-3 py-1.5 bg-sky-100 dark:bg-sky-900/30 rounded-full text-sm text-sky-800 dark:text-sky-200 hover:bg-sky-200 dark:hover:bg-sky-800/30">
                                <i class="fab fa-twitter mr-2"></i> Twitter
                            </a>
                        @endif
                        
                        @if($profile->website)
                            <a href="{{ $profile->website }}" target="_blank" class="inline-flex items-center px-3 py-1.5 bg-purple-100 dark:bg-purple-900/30 rounded-full text-sm text-purple-800 dark:text-purple-200 hover:bg-purple-200 dark:hover:bg-purple-800/30">
                                <i class="fas fa-globe mr-2"></i> Website
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="py-16 px-6 text-center">
            <svg class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No profile found</h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Create your profile to showcase your personal information.</p>
            <div class="mt-6 flex space-x-4">
                <a href="{{ route('profile.create') }}" class="inline-flex items-center rounded-md bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Create Profile
                </a>
                <a href="{{ route('profile.create-default') }}" class="inline-flex items-center rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Create Default Profile
                </a>
            </div>
        </div>
    </div>
@endif
@endsection
