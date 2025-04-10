@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Profile</h1>
        <p class="mt-2 text-base text-gray-600 dark:text-gray-400">Update your professional details and contact information.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('profile.index') }}" class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition-colors duration-150 ease-in-out">
            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Profile
        </a>
    </div>
</div>

{{-- Ensure Font Awesome is included in your main layout (layouts.app) for the social icons --}}
{{-- Example: <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.x.x/css/all.min.css" ... /> --}}

<div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 sm:px-8">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Profile Information</h2>
    </div>
    <div class="p-6 sm:p-8">
        <form action="{{ route('profile.update', $profile) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Basic Information Section --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $profile->full_name ?? '') }}" required
                               class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                        @error('full_name')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Professional Title <span class="text-red-500">*</span></label>
                        <input type="text" id="title" name="title" value="{{ old('title', $profile->title ?? '') }}" required placeholder="e.g. Full Stack Developer"
                               class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                        @error('title')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Bio <span class="text-red-500">*</span></label>
                    <textarea id="bio" name="bio" rows="4" required
                              class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">{{ old('bio', $profile->bio ?? '') }}</textarea>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Write a brief description about yourself and your professional background.</p>
                    @error('bio')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contact Information Section --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email', $profile->email ?? '') }}" required
                               class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                        @error('email')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone ?? '') }}" placeholder="+1 (123) 456-7890"
                               class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                        @error('phone')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $profile->location ?? '') }}" placeholder="City, Country"
                           class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                    @error('location')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Profile Photo Section --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Profile Photo</label>
                    <div class="mt-2 flex items-center gap-4">
                        @if(isset($profile->avatar) && $profile->avatar)
                            <img src="{{ asset('storage/' . $profile->avatar) }}" alt="{{ $profile->full_name }}" class="h-16 w-16 rounded-full object-cover bg-gray-100 dark:bg-gray-700 ring-2 ring-white dark:ring-gray-800">
                        @else
                            <span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-700 ring-2 ring-white dark:ring-gray-800">
                                <svg class="h-8 w-8 text-gray-400 dark:text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                     <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        @endif
                        <label for="avatar" class="cursor-pointer rounded-lg bg-white dark:bg-gray-700 py-2 px-4 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-purple-500 dark:focus-within:ring-purple-400 focus-within:ring-offset-2 dark:focus-within:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                            <span>Change Photo</span>
                            <input id="avatar" name="avatar" type="file" class="sr-only">
                        </label>
                    </div>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 2MB. Square aspect ratio recommended.</p>
                    @error('avatar')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Resume URL Section --}}
                <div>
                    <label for="resume_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Resume URL</label>
                     <div class="relative">
                         <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                             <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                             </svg>
                         </div>
                         <input type="url" id="resume_url" name="resume_url" value="{{ old('resume_url', $profile->resume_url ?? '') }}" placeholder="https://your-cloud-storage.com/resume.pdf"
                                class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                    </div>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Link to your resume (e.g., Google Drive, Dropbox, personal site).</p>
                    @error('resume_url')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Social Links Section --}}
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-3 mb-6">Social Links</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">
                        {{-- GitHub --}}
                        <div>
                            <label for="github" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">GitHub URL</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                    <i class="fab fa-github h-5 w-5 text-gray-400 dark:text-gray-500"></i>
                                </div>
                                <input type="url" id="github" name="github" value="{{ old('github', $profile->github ?? '') }}" placeholder="https://github.com/username"
                                       class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                            </div>
                            @error('github')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- LinkedIn --}}
                        <div>
                            <label for="linkedin" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">LinkedIn URL</label>
                             <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                    <i class="fab fa-linkedin h-5 w-5 text-gray-400 dark:text-gray-500"></i>
                                </div>
                                <input type="url" id="linkedin" name="linkedin" value="{{ old('linkedin', $profile->linkedin ?? '') }}" placeholder="https://linkedin.com/in/username"
                                       class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                             </div>
                            @error('linkedin')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Twitter --}}
                        <div>
                            <label for="twitter" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Twitter URL</label>
                             <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                    <i class="fab fa-twitter h-5 w-5 text-gray-400 dark:text-gray-500"></i>
                                </div>
                                <input type="url" id="twitter" name="twitter" value="{{ old('twitter', $profile->twitter ?? '') }}" placeholder="https://twitter.com/username"
                                       class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                            </div>
                            @error('twitter')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Website --}}
                        <div>
                            <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Website URL</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                    <i class="fas fa-globe h-5 w-5 text-gray-400 dark:text-gray-500"></i>
                                </div>
                                <input type="url" id="website" name="website" value="{{ old('website', $profile->website ?? '') }}" placeholder="https://yourdomain.com"
                                       class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-purple-500 dark:focus:border-purple-400 focus:ring-2 focus:ring-purple-500/20 dark:focus:ring-purple-400/30 focus:outline-none">
                            </div>
                            @error('website')
                                <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                <button type="reset" class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Reset
                </button>
                <button type="submit" class="inline-flex items-center rounded-lg border border-transparent bg-purple-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Update Profile
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
