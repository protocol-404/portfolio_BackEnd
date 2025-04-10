@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <div>
        {{-- Updated Heading Size --}}
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Add New Skill</h1>
        {{-- Updated Description Size --}}
        <p class="mt-2 text-base text-gray-600 dark:text-gray-400">Add a new skill to your portfolio.</p>
    </div>
    <div class="mt-4 sm:mt-0">
        {{-- Updated Button Styling --}}
        <a href="{{ route('skills.index') }}" class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-900 transition-colors duration-150 ease-in-out">
            {{-- Added xmlns --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Skills
        </a>
    </div>
</div>

{{-- Updated Card Styling --}}
<div class="bg-white dark:bg-gray-800 overflow-hidden rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
    {{-- Updated Header Padding --}}
    <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 sm:px-8">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Skill Information</h2>
    </div>
    {{-- Updated Body Padding --}}
    <div class="p-6 sm:p-8">
        <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Updated Spacing --}}
            <div class="space-y-8">
                {{-- Skill Name --}}
                <div>
                    {{-- Updated Label Margin --}}
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Skill Name <span class="text-red-500">*</span></label>
                    {{-- Updated Input Styling --}}
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                           class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-500/20 dark:focus:ring-green-400/30 focus:outline-none">
                    @error('name')
                        {{-- Updated Error Margin --}}
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Category</label>
                    {{-- Updated Select Styling --}}
                    <select id="category" name="category"
                            class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-500/20 dark:focus:ring-green-400/30 focus:outline-none">
                        <option value="">Select a category (optional)</option>
                        {{-- Use @selected for cleaner syntax --}}
                        <option value="Frontend" @selected(old('category') == 'Frontend')>Frontend</option>
                        <option value="Backend" @selected(old('category') == 'Backend')>Backend</option>
                        <option value="Database" @selected(old('category') == 'Database')>Database</option>
                        <option value="DevOps" @selected(old('category') == 'DevOps')>DevOps</option>
                        <option value="Mobile" @selected(old('category') == 'Mobile')>Mobile</option>
                        <option value="Design" @selected(old('category') == 'Design')>Design</option>
                        <option value="Testing" @selected(old('category') == 'Testing')>Testing</option>
                        <option value="Cloud" @selected(old('category') == 'Cloud')>Cloud</option>
                        <option value="Other" @selected(old('category') == 'Other')>Other</option>
                    </select>
                    @error('category')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Proficiency --}}
                <div>
                    <label for="proficiency" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Proficiency (%) <span class="text-red-500">*</span></label>
                    {{-- Updated Slider Layout and Styling --}}
                    <div class="mt-3 flex items-center space-x-4">
                        <input type="range" id="proficiency" name="proficiency" min="0" max="100" step="5" value="{{ old('proficiency', 50) }}" {{-- Default value 50 --}}
                               class="w-full h-2 bg-gray-200 dark:bg-gray-600 rounded-lg appearance-none cursor-pointer accent-green-600 dark:accent-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800 focus:ring-green-500/50 dark:focus:ring-green-400/60"
                               aria-labelledby="proficiency-label">
                        <span id="proficiency-value" class="flex-shrink-0 text-sm font-semibold text-green-700 dark:text-green-400 w-12 text-right">50%</span> {{-- Initial value matches default --}}
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
                    {{-- Updated File Input Layout and Styling --}}
                    <div class="mt-2 flex items-center gap-4">
                         {{-- Placeholder --}}
                         <span id="icon-preview-placeholder" class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700 ring-1 ring-inset ring-gray-300 dark:ring-gray-600">
                             {{-- Added xmlns to placeholder SVG --}}
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5z" />
                             </svg>
                         </span>
                         {{-- Image Preview (hidden initially) --}}
                         <img id="icon-preview" src="#" alt="Icon preview" class="h-16 w-16 flex-shrink-0 rounded-lg object-contain bg-gray-100 dark:bg-gray-700 p-1 ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hidden">

                         {{-- Upload Button --}}
                        <label for="icon" class="cursor-pointer rounded-lg bg-white dark:bg-gray-700 py-2 px-4 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-green-500 dark:focus-within:ring-green-400 focus-within:ring-offset-2 dark:focus-within:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                            <span id="icon-button-text">Upload Icon</span>
                            <input id="icon" name="icon" type="file" class="sr-only" accept="image/png, image/jpeg, image/gif, image/svg+xml, image/webp">
                        </label>
                    </div>
                    {{-- Updated Helper Text Size --}}
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Optional. Upload an icon (SVG, PNG, JPG). ~1MB max.</p>
                    @error('icon')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Description</label>
                    {{-- Updated Textarea Styling --}}
                    <textarea id="description" name="description" rows="3"
                              class="block w-full rounded-lg border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700/50 dark:text-white shadow-sm px-4 py-2.5 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-500/20 dark:focus:ring-green-400/30 focus:outline-none">{{ old('description') }}</textarea>
                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">Optional. Briefly describe your experience or projects related to this skill.</p>
                    @error('description')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-3">
                {{-- Updated Button Styling --}}
                <button type="reset" class="inline-flex items-center justify-center rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Reset
                </button>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg border border-transparent bg-green-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-colors duration-150 ease-in-out">
                    Save Skill
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
            const updateValue = () => {
                proficiencyValue.textContent = proficiencySlider.value + '%';
            };
            updateValue();
            proficiencySlider.addEventListener('input', updateValue);
            proficiencySlider.form.addEventListener('reset', () => {
                setTimeout(() => {
                    proficiencySlider.value = proficiencySlider.defaultValue;
                    updateValue();
                }, 0);
            });
        }

        const iconInput = document.getElementById('icon');
        const iconPreview = document.getElementById('icon-preview');
        const iconPlaceholder = document.getElementById('icon-preview-placeholder');
        const iconButtonText = document.getElementById('icon-button-text');

        if (iconInput && iconPreview && iconPlaceholder && iconButtonText) {
            iconInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        iconPreview.src = e.target.result;
                        iconPreview.classList.remove('hidden');
                        iconPlaceholder.classList.add('hidden');
                        iconButtonText.textContent = 'Change Icon';
                    }
                    reader.readAsDataURL(file);
                } else {
                    iconPreview.src = '#';
                    iconPreview.classList.add('hidden');
                    iconPlaceholder.classList.remove('hidden');
                    iconButtonText.textContent = 'Upload Icon';
                }
            });

            iconInput.form.addEventListener('reset', () => {
                 setTimeout(() => {
                    iconPreview.src = '#';
                    iconPreview.classList.add('hidden');
                    iconPlaceholder.classList.remove('hidden');
                    iconButtonText.textContent = 'Upload Icon';
                 }, 0);
            });
        }
    });
</script>
@endsection
