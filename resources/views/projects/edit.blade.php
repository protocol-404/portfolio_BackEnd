@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Project</h1>
        <p class="mt-2 text-base text-gray-600 dark:text-gray-400">Update project information and details.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('projects.index') }}" class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition-colors duration-150 ease-in-out">
            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Projects
        </a>
    </div>
</div>

{{-- Ensure Font Awesome is included if you prefer its icons over Heroicons/inline SVG for consistency --}}

<div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 sm:px-8">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Project Information</h2>
    </div>
    <div class="p-6 sm:p-8">
        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Project Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required
                           class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/30 focus:outline-none">
                    @error('title')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Project Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Description <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="5" required
                              class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/30 focus:outline-none">{{ old('description', $project->description) }}</textarea>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Provide a detailed description, highlighting key features, challenges, and technologies used.</p>
                    @error('description')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Technologies Used --}}
                <div>
                    <label for="technologies" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Technologies Used</label>
                    <input type="text" id="technologies" name="technologies" value="{{ old('technologies', $project->technologies ?? '') }}" placeholder="e.g., React, Node.js, Tailwind CSS, MySQL"
                           class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/30 focus:outline-none">
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Comma-separated list of key technologies.</p>
                    @error('technologies')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                    {{-- Note: For a better UX with tags, consider a dedicated JS library like Tagify or Select2 in the future --}}
                </div>

                {{-- Project Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Project Image</label>
                    <div class="mt-2 flex flex-col sm:flex-row sm:items-start gap-4">
                         <div class="flex-shrink-0">
                             @if($project->image)
                             <img id="image-preview" src="{{ asset('storage/' . $project->image) }}" alt="Current project image" class="h-32 w-auto max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-lg object-cover bg-gray-100 dark:bg-gray-700 ring-1 ring-inset ring-gray-300 dark:ring-gray-600">
                             @else
                             <span id="image-preview-placeholder" class="flex h-32 w-48 items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700 ring-1 ring-inset ring-gray-300 dark:ring-gray-600">
                                 <svg class="h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5z" />
                                 </svg>
                             </span>
                              <img id="image-preview" src="#" alt="New project image preview" class="h-32 w-auto max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg rounded-lg object-cover bg-gray-100 dark:bg-gray-700 ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hidden">
                             @endif
                         </div>
                         <div class="mt-2 sm:mt-0">
                             <label for="image" class="cursor-pointer rounded-lg bg-white dark:bg-gray-700 py-2 px-4 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 dark:focus-within:ring-blue-400 focus-within:ring-offset-2 dark:focus-within:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                                 <span id="image-button-text">{{ $project->image ? 'Change Image' : 'Upload Image' }}</span>
                                 <input id="image" name="image" type="file" class="sr-only" accept="image/png, image/jpeg, image/gif, image/webp">
                             </label>
                             <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF, WEBP up to 2MB. Recommended aspect ratio 4:3.</p>
                         </div>
                    </div>
                    @error('image')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Date & Status Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
                    <div>
                        <label for="completed_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Completed Date</label>
                        <input type="date" id="completed_date" name="completed_date" value="{{ old('completed_date', $project->completed_date ? $project->completed_date->format('Y-m-d') : '') }}"
                               class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/30 focus:outline-none appearance-none">
                               {{-- appearance-none helps normalize date input styling slightly --}}
                        @error('completed_date')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Project Status</label>
                        <select id="status" name="status"
                                class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/30 focus:outline-none">
                            <option value="completed" @selected(old('status', $project->status) == 'completed')>Completed</option>
                            <option value="in-progress" @selected(old('status', $project->status) == 'in-progress')>In Progress</option>
                            <option value="planned" @selected(old('status', $project->status) == 'planned')>Planned</option>
                            <option value="on-hold" @selected(old('status', $project->status) == 'on-hold')>On Hold</option> {{-- Added Example --}}
                        </select>
                        @error('status')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- URLs Grid --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-8">
                     {{-- Live Demo URL --}}
                    <div>
                        <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Live Demo URL</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                </svg>
                            </div>
                            <input type="url" id="url" name="url" value="{{ old('url', $project->url) }}" placeholder="https://example-project.com"
                                   class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/30 focus:outline-none">
                        </div>
                        @error('url')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- GitHub URL --}}
                    <div>
                        <label for="github_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">GitHub URL</label>
                        <div class="relative">
                             <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                 {{-- Using Font Awesome here for consistency if used elsewhere, otherwise inline SVG is fine --}}
                                 <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>
                             </div>
                            <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/username/repo"
                                   class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm pl-11 pr-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 dark:focus:ring-blue-400/30 focus:outline-none">
                        </div>
                        @error('github_url')
                            <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                <button type="reset" class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Reset
                </button>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-blue-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('image-preview');
        const imagePreviewPlaceholder = document.getElementById('image-preview-placeholder');
        const imageButtonText = document.getElementById('image-button-text');

        if (imageInput && imagePreview && imageButtonText) {
            imageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden'); // Show the img tag
                        if(imagePreviewPlaceholder) {
                            imagePreviewPlaceholder.classList.add('hidden'); // Hide the placeholder SVG span if it exists
                        }
                        imageButtonText.textContent = 'Change Image';
                    }
                    reader.readAsDataURL(file);
                }
            });

             // Handle form reset to potentially restore original image state
             imageInput.form.addEventListener('reset', () => {
                // Needs a slight delay for the browser to reset the file input value
                setTimeout(() => {
                    // This is tricky because we don't easily know the *original* src without storing it
                    // Simplest reset might just hide the preview if no file is selected
                    if (!imageInput.files || imageInput.files.length === 0) {
                         // If there was an original image (check via blade variable or data attribute maybe)
                         const originalImageSrc = "{{ $project->image ? asset('storage/' . $project->image) : '' }}";
                         if (originalImageSrc) {
                             imagePreview.src = originalImageSrc;
                             imagePreview.classList.remove('hidden');
                             if(imagePreviewPlaceholder) imagePreviewPlaceholder.classList.add('hidden');
                             imageButtonText.textContent = 'Change Image';
                         } else {
                             // No original image, reset to placeholder state
                             imagePreview.src = '#'; // Clear src
                             imagePreview.classList.add('hidden');
                             if(imagePreviewPlaceholder) imagePreviewPlaceholder.classList.remove('hidden');
                             imageButtonText.textContent = 'Upload Image';
                         }
                    }
                }, 0);
            });
        }
    });
</script>
@endsection
