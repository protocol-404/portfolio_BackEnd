@extends('layouts.app')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Skills</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Manage your technical skills and expertise</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('skills.create') }}" class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
            {{-- Added xmlns --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Skill
        </a>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
    @if(isset($skills) && $skills->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        {{-- Adjusted padding for ID column potentially --}}
                        <th scope="col" class="pl-4 pr-3 sm:pl-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                        {{-- Adjusted padding for Icon column --}}
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Icon</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Proficiency</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($skills as $skill)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            {{-- Adjusted padding --}}
                            <td class="pl-4 pr-3 sm:pl-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">{{ $skill->id }}</td>

                            {{-- *** CORRECTED ICON DISPLAY LOGIC *** --}}
                            <td class="px-3 py-4 whitespace-nowrap">
                                @if($skill->icon)
                                    {{-- Display the image using asset() and storage path --}}
                                    <div class="h-8 w-8 flex-shrink-0"> {{-- Adjust size H/W as needed --}}
                                        <img src="{{ asset('storage/' . $skill->icon) }}" alt="{{ $skill->name }} icon"
                                             class="h-full w-full object-contain" title="{{ $skill->name }}">
                                    </div>
                                @else
                                    {{-- Keep the placeholder SVG --}}
                                    <div class="h-8 w-8 rounded-md flex items-center justify-center bg-gray-200 dark:bg-gray-700 text-gray-500 dark:text-gray-400" title="No icon">
                                        {{-- Added xmlns to placeholder --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            {{-- Using a generic code/brackets icon as placeholder --}}
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            {{-- End Corrected Icon Logic --}}

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $skill->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{-- Adjusted width slightly for the bar container --}}
                                    <div class="w-24 bg-gray-200 dark:bg-gray-700 rounded-full h-2 mr-2">
                                        <div class="bg-green-600 dark:bg-green-500 h-2 rounded-full" style="width: {{ $skill->proficiency }}%"></div>
                                    </div>
                                    <span class="text-xs font-medium text-gray-600 dark:text-gray-300">{{ $skill->proficiency }}%</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $skill->created_at->format('M d, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <div class="flex space-x-2">
                                    {{-- Edit Action (Added xmlns) --}}
                                    <a href="{{ route('skills.edit', $skill) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    {{-- Delete Action (Added xmlns) --}}
                                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this skill?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
            {{ $skills->links() }}
        </div>
    @else
        <div class="py-16 px-6 text-center">
             {{-- Added xmlns, changed stroke-width, changed icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527c.48-.342 1.12-.329 1.58.031l.755.583c.46.355.616.976.385 1.48l-.606 1.05c-.23.402-.245.89-.038 1.293l.606 1.154c.23.44.14.99-.19 1.32l-.737.527c-.35.25-.807.272-1.205.108-.396-.165-.71-.506-.78-.93l-.149-.894c-.09-.542-.56-.94-1.11-.94h-1.093c-.55 0-1.02.398-1.11.94l-.149.894c-.07.424-.384.764-.78.93-.398.164-.855.142-1.205-.108l-.737-.527c-.48-.342-1.12-.329-1.58.031l-.755.583c-.46.355-.616.976-.385 1.48l.606 1.05c.23.402.245.89.038 1.293l-.606 1.154c-.23.44-.14.99.19 1.32l.737.527c.35.25.807.272 1.205.108.396-.165.71-.506.78-.93l.149.894c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527c.48-.342 1.12-.329 1.58.031l.755.583c.46.355.616.976-.385 1.48l-.606 1.05c-.23.402-.245.89-.038 1.293l.606 1.154c-.23.44-.14.99.19 1.32l-.737-.527z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No skills found</h3>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Start showcasing your expertise by adding your skills.</p>
            <div class="mt-6">
                <a href="{{ route('skills.create') }}" class="inline-flex items-center rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    {{-- Added xmlns --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Add Skill
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
