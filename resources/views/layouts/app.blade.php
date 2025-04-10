<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">
    <title>Portfolio Dashboard</title>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Alpine.js for dropdowns and components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // Set dark mode based on system preference or previous preference
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900 dark:bg-gray-900 dark:text-gray-100">
    <div class="flex min-h-screen">
        <!-- Mobile menu button -->
        <div class="lg:hidden fixed top-0 left-0 z-20 p-4">
            <button id="mobile-menu-button" class="rounded-md p-2 text-gray-600 hover:bg-gray-100 focus:outline-none dark:text-gray-300 dark:hover:bg-gray-800">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Sidebar -->
        <aside id="sidebar" class="bg-white dark:bg-gray-800 fixed inset-y-0 left-0 z-10 w-64 transform -translate-x-full lg:translate-x-0 transition duration-200 ease-in-out lg:relative lg:flex lg:flex-col shadow-lg flex-shrink-0">
            <!-- Logo section -->
            <div class="px-4 py-6 border-b border-gray-200 dark:border-gray-700 flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <div class="h-10 w-10 bg-gradient-to-tr from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Portfolio</span>
                </a>
            </div>

            <!-- Navigation links -->
            <nav class="flex-grow px-4 py-6 overflow-y-auto">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="group flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-indigo-500/10 to-purple-500/10 text-indigo-600 dark:text-indigo-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700' }}">
                            <i class="fas fa-chart-line w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600 dark:text-indigo-400' : 'text-slate-500 group-hover:text-slate-600 dark:text-slate-400 dark:group-hover:text-slate-300' }}"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('projects.index') }}" class="group flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('projects.*') ? 'bg-gradient-to-r from-pink-500/10 to-rose-500/10 text-pink-600 dark:text-pink-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700' }}">
                            <i class="fas fa-briefcase w-5 h-5 mr-3 {{ request()->routeIs('projects.*') ? 'text-pink-600 dark:text-pink-400' : 'text-slate-500 group-hover:text-slate-600 dark:text-slate-400 dark:group-hover:text-slate-300' }}"></i>
                            <span class="font-medium">Projects</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('skills.index') }}" class="group flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('skills.*') ? 'bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-600 dark:text-emerald-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700' }}">
                            <i class="fas fa-code w-5 h-5 mr-3 {{ request()->routeIs('skills.*') ? 'text-emerald-600 dark:text-emerald-400' : 'text-slate-500 group-hover:text-slate-600 dark:text-slate-400 dark:group-hover:text-slate-300' }}"></i>
                            <span class="font-medium">Skills</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.index') }}" class="group flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('profile.*') ? 'bg-gradient-to-r from-violet-500/10 to-purple-500/10 text-violet-600 dark:text-violet-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700' }}">
                            <i class="fas fa-user w-5 h-5 mr-3 {{ request()->routeIs('profile.*') ? 'text-violet-600 dark:text-violet-400' : 'text-slate-500 group-hover:text-slate-600 dark:text-slate-400 dark:group-hover:text-slate-300' }}"></i>
                            <span class="font-medium">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('messages.index') }}" class="group flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('messages.*') ? 'bg-gradient-to-r from-amber-500/10 to-orange-500/10 text-amber-600 dark:text-amber-400' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700' }}">
                            <i class="fas fa-envelope w-5 h-5 mr-3 {{ request()->routeIs('messages.*') ? 'text-amber-600 dark:text-amber-400' : 'text-slate-500 group-hover:text-slate-600 dark:text-slate-400 dark:group-hover:text-slate-300' }}"></i>
                            <span class="font-medium">Messages</span>
                            @php
                                $unreadCount = \App\Models\Message::where('read', false)->count();
                            @endphp
                            @if($unreadCount > 0)
                                <span class="ml-auto bg-red-500 text-white text-xs font-semibold px-2 py-0.5 rounded-full">{{ $unreadCount }}</span>
                            @endif
                        </a>
                    </li>
                </ul>

                <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="px-4 mb-4">
                        <p class="text-xs uppercase font-semibold tracking-wider text-slate-500 dark:text-slate-400">Account</p>
                    </div>
                    <div x-data="{ open: false }" @click.outside="open = false" class="relative">
                        <button @click="open = !open" class="w-full flex items-center px-4 py-3 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700 rounded-xl">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-600 flex items-center justify-center text-white">
                                <i class="fas fa-user"></i> 
                            </div>
                            <div class="ml-3 flex-grow text-left">
                                <p class="text-sm font-medium">Admin</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Administrator</p>
                            </div>
                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-100" 
                             x-transition:enter-start="transform opacity-0 scale-95" 
                             x-transition:enter-end="transform opacity-100 scale-100" 
                             x-transition:leave="transition ease-in duration-75" 
                             x-transition:leave-start="transform opacity-100 scale-100" 
                             x-transition:leave-end="transform opacity-0 scale-95" 
                             class="absolute right-0 mt-2 w-56 bg-white dark:bg-gray-800 rounded-xl shadow-lg z-50 overflow-hidden border border-gray-100 dark:border-gray-700">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700">Settings</a>
                                <div class="border-t border-gray-200 dark:border-gray-700"></div>
                                <a href="#" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-gray-700">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 overflow-auto pb-12 bg-slate-50 dark:bg-gray-900">
            <!-- Top header -->
            <header class="sticky top-0 z-10 bg-white dark:bg-gray-800 shadow-sm h-16 flex items-center px-6 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 lg:hidden flex-1">Portfolio Dashboard</h1>
                
                <div class="ml-auto flex items-center space-x-4">
                    <!-- Dark mode toggle -->
                    <button id="theme-toggle" class="relative rounded-full p-2 text-slate-500 hover:bg-slate-100 dark:text-slate-400 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400">
                        <!-- Sun icon -->
                        <svg id="theme-toggle-light-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                        <!-- Moon icon -->
                        <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Page content -->
            <div class="py-6 px-6">
                <!-- Alerts -->
                @if(session('success'))
                    <div id="alert-success" class="bg-green-50 text-green-800 dark:bg-green-900/50 dark:text-green-100 rounded-lg p-4 mb-6 flex items-center justify-between" role="alert">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-green-500 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" onclick="document.getElementById('alert-success').style.display='none'" class="text-green-600 dark:text-green-400 hover:text-green-700 dark:hover:text-green-300 focus:outline-none">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if(session('warning'))
                    <div id="alert-warning" class="bg-yellow-50 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-100 rounded-lg p-4 mb-6 flex items-center justify-between" role="alert">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 mr-2 text-yellow-500 dark:text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>{{ session('warning') }}</span>
                        </div>
                        <button type="button" onclick="document.getElementById('alert-warning').style.display='none'" class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300 focus:outline-none">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif

                @if($errors->any())
                    <div id="alert-error" class="bg-red-50 text-red-800 dark:bg-red-900/50 dark:text-red-100 rounded-lg p-4 mb-6" role="alert">
                        <div class="flex items-start">
                            <svg class="h-5 w-5 mr-2 text-red-500 dark:text-red-400 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <ul class="list-disc ml-5 space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="button" onclick="document.getElementById('alert-error').style.display='none'" class="ml-auto -mt-1 text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 focus:outline-none">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- jQuery from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('mobile-menu-button').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('-translate-x-full');
            });

            // Dark mode toggle
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme') in localStorage && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            const themeToggleBtn = document.getElementById('theme-toggle');
            themeToggleBtn.addEventListener('click', function() {
                // Toggle icons inside button
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                // If set via local storage previously
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            });

            // Handle alert dismissals
            const dismissButtons = document.querySelectorAll('[data-dismiss="alert"]');
            dismissButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const alert = button.closest('.alert');
                    if (alert) {
                        alert.remove();
                    }
                });
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const sidebar = document.getElementById('sidebar');
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                
                if (sidebar && mobileMenuButton && window.innerWidth < 1024) {
                    if (!sidebar.contains(event.target) && 
                        !mobileMenuButton.contains(event.target) && 
                        !sidebar.classList.contains('-translate-x-full')) {
                        sidebar.classList.add('-translate-x-full');
                    }
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
