@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Skill</h1>
        <p class="mt-2 text-base text-gray-600 dark:text-gray-400">Update the details for your skill.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('skills.index') }}" class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition-colors duration-150 ease-in-out">
            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Skills
        </a>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 sm:px-8">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Skill Information</h2>
    </div>
    <div class="p-6 sm:p-8">
        <form action="{{ route('skills.update', $skill) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Skill Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Skill Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $skill->name) }}" required
                           class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-500/20 dark:focus:ring-green-400/30 focus:outline-none">
                    @error('name')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Category</label>
                    {{-- Ensure you have the Tailwind Forms plugin for better default select styling --}}
                    <select id="category" name="category"
                            class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-500/20 dark:focus:ring-green-400/30 focus:outline-none">
                        <option value="">Select a category (optional)</option>
                        <option value="Frontend" @selected(old('category', $skill->category ?? '') == 'Frontend')>Frontend</option>
                        <option value="Backend" @selected(old('category', $skill->category ?? '') == 'Backend')>Backend</option>
                        <option value="Database" @selected(old('category', $skill->category ?? '') == 'Database')>Database</option>
                        <option value="DevOps" @selected(old('category', $skill->category ?? '') == 'DevOps')>DevOps</option>
                        <option value="Mobile" @selected(old('category', $skill->category ?? '') == 'Mobile')>Mobile</option>
                        <option value="Design" @selected(old('category', $skill->category ?? '') == 'Design')>Design</option> {{-- Added Example --}}
                        <option value="Testing" @selected(old('category', $skill->category ?? '') == 'Testing')>Testing</option> {{-- Added Example --}}
                        <option value="Cloud" @selected(old('category', $skill->category ?? '') == 'Cloud')>Cloud</option>     {{-- Added Example --}}
                        <option value="Other" @selected(old('category', $skill->category ?? '') == 'Other')>Other</option>
                    </select>
                    @error('category')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Proficiency --}}
                <div>
                    <label for="proficiency" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Proficiency (%) <span class="text-red-500">*</span></label>
                    <div class="mt-3 flex items-center space-x-4">
                        <input type="range" id="proficiency" name="proficiency" min="0" max="100" step="5" value="{{ old('proficiency', $skill->proficiency) }}"
                               class="w-full h-2 bg-gray-200 dark:bg-gray-600 rounded-lg appearance-none cursor-pointer accent-green-600 dark:accent-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800 focus:ring-green-500/50 dark:focus:ring-green-400/60"
                               aria-labelledby="proficiency-label">
                        <span id="proficiency-value" class="flex-shrink-0 text-sm font-semibold text-green-700 dark:text-green-400 w-12 text-right">{{ old('proficiency', $skill->proficiency) }}%</span>
                    </div>
                    <div class="mt-1.5 flex justify-between text-xs text-gray-500 dark:text-gray-400 px-1" aria-hidden="true">
                        <span>Beginner</span>
                        <span>Expert</span>
                    </div>
                    @error('proficiency')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Skill Icon --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Skill Icon</label>
                    <div class="mt-2 flex items-center gap-4">
                         @if($skill->icon)
                         <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }}" class="h-16 w-16 flex-shrink-0 rounded-lg object-contain bg-gray-100 dark:bg-gray-700 p-1 ring-1 ring-inset ring-gray-300 dark:ring-gray-600">
                         @else
                         <span class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700 ring-1 ring-inset ring-gray-300 dark:ring-gray-600">
                             <svg class="h-8 w-8 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                             </svg>
                         </span>
                         @endif
                        <label for="icon" class="cursor-pointer rounded-lg bg-white dark:bg-gray-700 py-2 px-4 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-green-500 dark:focus-within:ring-green-400 focus-within:ring-offset-2 dark:focus-within:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                            <span>{{ $skill->icon ? 'Change' : 'Upload' }} Icon</span>
                            <input id="icon" name="icon" type="file" class="sr-only">
                        </label>
                    </div>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Optional. Upload an icon (SVG, PNG, JPG). ~1MB max.</p>
                    @error('icon')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Description</label>
                    <textarea id="description" name="description" rows="3"
                              class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-500/20 dark:focus:ring-green-400/30 focus:outline-none">{{ old('description', $skill->description ?? '') }}</textarea>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Optional. Briefly describe your experience or projects related to this skill.</p>
                    @error('description')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                <button type="reset" class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Reset
                </button>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-green-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Update Skill
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const proficiencySlider = document.getElementById('proficiency');
        const proficiencyValue = document.getElementById('proficiency-value');

        if (proficiencySlider && proficiencyValue) {
            // Function to update the display
            const updateValue = () => {
                proficiencyValue.textContent = proficiencySlider.value + '%';
            };

            // Set initial value on load
            updateValue();

            // Update value when slider is moved
            proficiencySlider.addEventListener('input', updateValue);

            // Optional: Update value on reset if the form reset doesn't trigger 'input'
            proficiencySlider.form.addEventListener('reset', () => {
                // Set timeout allows the browser to reset the value first
                setTimeout(updateValue, 0);
            });
        }

        // Optional: Basic file input preview for the icon
        const iconInput = document.getElementById('icon');
        if (iconInput) {
            const currentIconPreview = iconInput.closest('div').querySelector('img, span.flex'); // Find existing preview/placeholder
            const changeButtonLabel = iconInput.previousElementSibling.querySelector('span'); // Get the span inside the label

            iconInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file && currentIconPreview) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        let previewElement = currentIconPreview;
                        // If it's the placeholder span, replace it with an img
                        if (previewElement.tagName === 'SPAN') {
                            previewElement = document.createElement('img');
                            previewElement.className = 'h-16 w-16 flex-shrink-0 rounded-lg object-contain bg-gray-100 dark:bg-gray-700 p-1 ring-1 ring-inset ring-gray-300 dark:ring-gray-600'; // Match style
                            currentIconPreview.parentNode.replaceChild(previewElement, currentIconPreview);
                        }
                        previewElement.src = e.target.result;
                        previewElement.alt = 'New icon preview';
                        if (changeButtonLabel) changeButtonLabel.textContent = 'Change Icon';
                    }
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
@endsection
