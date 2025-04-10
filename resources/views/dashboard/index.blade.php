@extends('layouts.app')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Dashboard Overview</h1>
    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Welcome to your portfolio management dashboard</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Projects Card -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-md bg-blue-100 dark:bg-blue-900/30 p-3">
                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Projects</dt>
                        <dd>
                            <div class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $projectCount }}</div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700/50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('projects.index') }}" class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500 dark:hover:text-blue-300 flex justify-between items-center">
                    <span>View all projects</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Skills Card -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-md bg-green-100 dark:bg-green-900/30 p-3">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Skills</dt>
                        <dd>
                            <div class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $skillCount }}</div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700/50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('skills.index') }}" class="font-medium text-green-600 dark:text-green-400 hover:text-green-500 dark:hover:text-green-300 flex justify-between items-center">
                    <span>View all skills</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Profile Card -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-md bg-purple-100 dark:bg-purple-900/30 p-3">
                    <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Profile</dt>
                        <dd>
                            <div class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $profileCount }}</div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700/50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('profile.index') }}" class="font-medium text-purple-600 dark:text-purple-400 hover:text-purple-500 dark:hover:text-purple-300 flex justify-between items-center">
                    <span>Manage profile</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Messages Card -->
    <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 transition-all hover:shadow-md">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0 rounded-md bg-amber-100 dark:bg-amber-900/30 p-3">
                    <svg class="h-6 w-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Messages</dt>
                        <dd class="flex items-baseline">
                            <div class="text-3xl font-semibold text-gray-900 dark:text-white">{{ $messageCount }}</div>
                            @if($unreadMessageCount > 0)
                                <span class="ml-2 px-2 py-0.5 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    {{ $unreadMessageCount }} unread
                                </span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 dark:bg-gray-700/50 px-5 py-3">
            <div class="text-sm">
                <a href="{{ route('messages.index') }}" class="font-medium text-amber-600 dark:text-amber-400 hover:text-amber-500 dark:hover:text-amber-300 flex justify-between items-center">
                    <span>View all messages</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- API Endpoints Section -->
<div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">API Endpoints</h2>
        <span class="bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200 text-xs font-medium py-1 px-2 rounded">Portfolio Front-end</span>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-4 lg:space-x-6">
                <div class="w-full sm:w-1/3 lg:w-1/5">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Projects</span>
                </div>
                <div class="flex flex-1 items-center rounded-md bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-2">
                    <code class="text-sm text-gray-800 dark:text-gray-200 flex-1">{{ url('/api/projects') }}</code>
                    <a href="{{ url('/api/projects') }}" target="_blank" class="ml-2 inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 dark:text-indigo-200 dark:bg-indigo-900/50 dark:hover:bg-indigo-900/75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        Test
                    </a>
                </div>
            </div>

            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-4 lg:space-x-6">
                <div class="w-full sm:w-1/3 lg:w-1/5">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Skills</span>
                </div>
                <div class="flex flex-1 items-center rounded-md bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-2">
                    <code class="text-sm text-gray-800 dark:text-gray-200 flex-1">{{ url('/api/skills') }}</code>
                    <a href="{{ url('/api/skills') }}" target="_blank" class="ml-2 inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 dark:text-indigo-200 dark:bg-indigo-900/50 dark:hover:bg-indigo-900/75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        Test
                    </a>
                </div>
            </div>

            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-4 lg:space-x-6">
                <div class="w-full sm:w-1/3 lg:w-1/5">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Profile</span>
                </div>
                <div class="flex flex-1 items-center rounded-md bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-2">
                    <code class="text-sm text-gray-800 dark:text-gray-200 flex-1">{{ url('/api/profile') }}</code>
                    <a href="{{ url('/api/profile') }}" target="_blank" class="ml-2 inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 dark:text-indigo-200 dark:bg-indigo-900/50 dark:hover:bg-indigo-900/75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        Test
                    </a>
                </div>
            </div>

            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-4 lg:space-x-6">
                <div class="w-full sm:w-1/3 lg:w-1/5">
                    <span class="font-medium text-gray-700 dark:text-gray-300">Contact/Messages</span>
                </div>
                <div class="flex flex-1 items-center rounded-md bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 p-2">
                    <code class="text-sm text-gray-800 dark:text-gray-200 flex-1">{{ url('/api/contact') }}</code>
                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200">
                        POST
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">Quick Actions</h2>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="{{ route('projects.create') }}" class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                <div class="flex-shrink-0 mr-3">
                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-blue-900 dark:text-blue-100">Add New Project</h3>
                    <p class="text-sm text-blue-700 dark:text-blue-300">Create a new portfolio project</p>
                </div>
            </a>

            <a href="{{ route('skills.create') }}" class="flex items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                <div class="flex-shrink-0 mr-3">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-green-900 dark:text-green-100">Add New Skill</h3>
                    <p class="text-sm text-green-700 dark:text-green-300">Add a skill to your portfolio</p>
                </div>
            </a>

            <a href="{{ route('profile.index') }}" class="flex items-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                <div class="flex-shrink-0 mr-3">
                    <svg class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-purple-900 dark:text-purple-100">Update Profile</h3>
                    <p class="text-sm text-purple-700 dark:text-purple-300">Edit your personal information</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
