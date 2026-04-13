<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>N9AD | Accountability</title>

    <!-- Laravel 12 uses Vite by default -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background: #0a0a0a; 
            color: #e4e4e7;
        }
        .mono { 
            font-family: 'JetBrains Mono', monospace; 
            font-variant-ligatures: none;
        }
        .glass-morphism { 
            background: rgba(17, 17, 19, 0.8); 
            backdrop-filter: blur(16px); 
            border: 1px solid rgba(39, 39, 42, 0.2);
        }
        .terminal-green { color: #10b981; }
        .status-online { color: #22c55e; }
        .status-pending { color: #f59e0b; }
        .status-offline { color: #ef4444; }
    </style>
</head>
<body class="antialiased bg-zinc-950">
    <div class="min-h-screen bg-zinc-950">
        <!-- SIDEBAR -->
        <aside class="fixed left-0 top-0 h-screen w-64 bg-zinc-900 border-r border-zinc-800 z-20 hidden lg:block">
            <div class="flex flex-col h-full">
                <!-- Logo Section -->
                <div class="p-6 border-b border-zinc-800">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-sm shadow-lg">9</div>
                        <div>
                            <h1 class="text-white font-bold text-lg">N9AD</h1>
                            <p class="text-zinc-500 text-xs font-mono">v1.0.0</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 p-4 space-y-1">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Dashboard
                    </x-nav-link>
                    
                    <x-nav-link href="#" :active="false">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Tasks
                    </x-nav-link>
                    
                    <x-nav-link href="#" :active="false">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </x-nav-link>
                </nav>

                <!-- Status Footer -->
                <div class="p-4 border-t border-zinc-800">
                    <div class="flex items-center justify-between text-xs">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-zinc-400">System Online</span>
                        </div>
                        <span class="text-zinc-500 mono">{{ now()->format('H:i') }}</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="lg:ml-64">
            <!-- TOP HEADER -->
            <header class="glass-morphism sticky top-0 z-10 border-b border-zinc-800 px-6 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="text-sm text-zinc-400">
                            <span class="text-zinc-500">Project:</span> 
                            <span class="text-white font-medium">Fil Rouge</span>
                        </div>
                        <div class="text-zinc-600">|</div>
                        <div class="text-sm text-zinc-400 mono">2025.04.08</div>
                    </div>

                    <!-- User Section -->
                    <div class="flex items-center gap-4">
                        <div class="text-right">
                            <div class="text-sm font-medium text-white">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-zinc-500">Administrator</div>
                        </div>
                        <div class="w-8 h-8 bg-zinc-700 rounded-full flex items-center justify-center text-white text-xs font-bold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-3 py-1.5 text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-300 rounded-md transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
