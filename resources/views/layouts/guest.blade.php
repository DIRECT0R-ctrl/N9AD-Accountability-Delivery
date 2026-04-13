<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>N9AD | Entry Protocol</title>
    <style>
        body { background-color: #09090b; background-image: radial-gradient(circle at 50% -20%, #1e1e2e, #09090b); }
    </style>
</head>
<body class="antialiased text-zinc-300">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <a href="/" class="flex flex-col items-center">
                <div class="h-16 w-16 bg-blue-600 rounded-3xl flex items-center justify-center text-white text-3xl font-bold shadow-[0_0_40px_rgba(37,99,235,0.3)] mb-4">9</div>
                <h1 class="text-white text-2xl font-black tracking-tighter uppercase">Accountability</h1>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-10 py-12 bg-zinc-900/50 backdrop-blur-xl border border-zinc-800 shadow-2xl overflow-hidden sm:rounded-[2rem]">
            {{ $slot }}
        </div>

        <div class="mt-8 text-zinc-600 text-[10px] font-mono uppercase tracking-[0.2em]">
            &copy; 2025 Architecture Protocol 9AD
        </div>
    </div>
</body>
</html>
