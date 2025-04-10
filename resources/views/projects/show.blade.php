@extends('layouts.app')

@section('content')
{{-- Outer container for centering and max-width --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Top Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <div class="flex items-center flex-wrap"> {{-- Added flex-wrap for responsiveness --}}
                <a href="{{ route('projects.index') }}" class="mr-3 mb-2 md:mb-0 h-8 w-8 rounded-full flex items-center justify-center bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm text-slate-500 hover:text-pink-600 transition-colors">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-2xl md:text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-600 dark:from-pink-400 dark:to-rose-500 mr-3 mb-2 md:mb-0">{{ $project->title }}</h1>

                @if(isset($project->status))
                    @if($project->status == 'completed')
                        <span class="ml-0 md:ml-3 mb-2 md:mb-0 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300 border border-green-200 dark:border-green-800">
                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            Completed
                        </span>
                    @elseif($project->status == 'in-progress')
                        <span class="ml-0 md:ml-3 mb-2 md:mb-0 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-300 border border-yellow-200 dark:border-yellow-800">
                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-yellow-500 dark:text-yellow-400" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            In Progress
                        </span>
                    @elseif($project->status == 'planned')
                        <span class="ml-0 md:ml-3 mb-2 md:mb-0 inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-blue-500 dark:text-blue-400" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            Planned
                        </span>
                    @endif
                @endif
            </div>
            @if($project->completed_date)
                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2 ml-11 md:ml-0"> {{-- Adjusted margin for alignment --}}
                    Completed: {{ $project->completed_date->format('F d, Y') }}
                </p>
            @endif
        </div>

        <div class="mt-4 md:mt-0 flex space-x-3">
            <a href="{{ route('projects.edit', $project) }}" class="inline-flex items-center rounded-lg px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-pink-500 to-rose-600 hover:from-pink-600 hover:to-rose-700 shadow-md hover:shadow-lg transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Project
            </a>
            <button type="button" onclick="confirmDelete()" class="inline-flex items-center rounded-lg px-4 py-2 text-sm font-medium text-rose-700 dark:text-rose-300 bg-rose-50 dark:bg-rose-900/20 hover:bg-rose-100 dark:hover:bg-rose-900/30 border border-rose-200 dark:border-rose-800 shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
                Delete
            </button>
        </div>
    </div>

    {{-- Hidden Delete Form --}}
    <form id="delete-form" action="{{ route('projects.destroy', $project) }}" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    {{-- Main Content Grid (already inside the centered container) --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Left Column --}}
        <div class="lg:col-span-2 space-y-6"> {{-- Adjusted space-y to match right col if needed --}}
            {{-- Image Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                @if($project->image)
                    <div class="relative overflow-hidden aspect-video w-full">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover transition-transform hover:scale-105 duration-500">
                    </div>
                @else
                    <div class="bg-gradient-to-br from-slate-100 to-slate-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center aspect-video w-full">
                        <svg class="h-24 w-24 text-slate-400 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                @endif
            </div>

            {{-- Description Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center">
                    <svg class="mr-2 h-5 w-5 text-pink-500 dark:text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                    Description
                </h3>
                <div class="prose prose-slate dark:prose-invert prose-p:text-slate-600 dark:prose-p:text-slate-300 max-w-none">
                    {{-- Using nl2br for basic line breaks, or consider a Markdown parser if needed --}}
                    <p>{!! nl2br(e($project->description)) !!}</p>
                </div>
            </div>
        </div>

        {{-- Right Sidebar --}}
        <div class="space-y-6">
            {{-- Links Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center">
                    <svg class="mr-2 h-5 w-5 text-pink-500 dark:text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                    Project Links
                </h3>
                <div class="space-y-4">
                    @if($project->url)
                        <a href="{{ $project->url }}" target="_blank" rel="noopener noreferrer" class="group flex items-center p-3 rounded-lg bg-gradient-to-r from-pink-50 to-rose-50 dark:from-pink-900/20 dark:to-rose-900/20 border border-pink-100 dark:border-pink-800/30 hover:border-pink-200 dark:hover:border-pink-700 transition-colors">
                            <span class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 flex items-center justify-center text-white">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                </svg>
                            </span>
                            <div class="ml-3 overflow-hidden"> {{-- Added overflow-hidden for better truncation --}}
                                <p class="text-sm font-medium text-slate-800 dark:text-white group-hover:text-pink-600 dark:group-hover:text-pink-400 transition-colors">Live Demo</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 group-hover:text-pink-500 dark:group-hover:text-pink-300 transition-colors truncate">{{-- Removed max-w as parent handles overflow --}}
                                    {{ $project->url }}
                                </p>
                            </div>
                        </a>
                    @endif

                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer" class="group flex items-center p-3 rounded-lg bg-gradient-to-r from-slate-50 to-slate-100 dark:from-slate-800/50 dark:to-slate-700/50 border border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600 transition-colors">
                            <span class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-900 dark:bg-gray-700 flex items-center justify-center text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </span>
                             <div class="ml-3 overflow-hidden"> {{-- Added overflow-hidden for better truncation --}}
                                <p class="text-sm font-medium text-slate-800 dark:text-white group-hover:text-slate-900 dark:group-hover:text-white transition-colors">GitHub Repository</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 group-hover:text-slate-700 dark:group-hover:text-slate-300 transition-colors truncate">{{-- Removed max-w as parent handles overflow --}}
                                    {{ $project->github_url }}
                                </p>
                            </div>
                        </a>
                    @endif

                    @if(!$project->url && !$project->github_url)
                        <div class="p-3 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-center">
                            <p class="text-sm text-slate-500 dark:text-slate-400">No links available</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Technologies Card --}}
            @if(isset($project->technologies) && $project->technologies)
            <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center">
                    <svg class="mr-2 h-5 w-5 text-pink-500 dark:text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Technologies
                </h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(explode(',', $project->technologies) as $tech)
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-pink-50 to-pink-100 text-pink-800 dark:from-pink-900/20 dark:to-pink-800/20 dark:text-pink-300 border border-pink-200 dark:border-pink-800/30">
                            {{ trim($tech) }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Project Info Card --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-4 flex items-center">
                    <svg class="mr-2 h-5 w-5 text-pink-500 dark:text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Project Details
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-slate-500 dark:text-slate-400">Created</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $project->created_at->format('F d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-slate-500 dark:text-slate-400">Last updated</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $project->updated_at->format('F d, Y') }}</span>
                    </div>
                    @if($project->completed_date)
                    <div class="flex justify-between">
                        <span class="text-sm text-slate-500 dark:text-slate-400">Completed</span>
                        <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $project->completed_date->format('F d, Y') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div> {{-- Close outer container --}}
@endsection

@section('scripts')
<script>
    function confirmDelete() {
        // Use a more modern confirmation dialog if available (e.g., SweetAlert),
        // otherwise fallback to the basic confirm.
        if (typeof Swal !== 'undefined') {
             Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', // Or your theme's danger color
                cancelButtonColor: '#3085d6', // Or your theme's secondary color
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            })
        } else if (confirm('Are you sure you want to delete this project? This action cannot be undone.')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endsection
