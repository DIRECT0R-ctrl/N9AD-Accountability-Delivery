<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - N9AD</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --dark: #0f0f0f;
            --dark-lighter: #1a1a1a;
            --dark-card: #242424;
            --text-primary: #ffffff;
            --text-secondary: #a1a1aa;
            --text-muted: #71717a;
            --border: #3f3f46;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .hero-gradient {
            background: radial-gradient(ellipse at center, #1a1a2e 0%, #0f0f0f 100%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .gradient-text {
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .btn-primary {
            background: var(--gradient-1);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .input-group {
            position: relative;
        }

        .input-field {
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }

        .input-field::placeholder {
            color: var(--text-muted);
        }

        .input-label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
        }

        .error-message {
            color: #ef4444;
            font-size: 14px;
            margin-top: 6px;
        }

        .tech-grid {
            background-image: 
                linear-gradient(rgba(99, 102, 241, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Logo Styling */
        .logo-container {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .logo-container:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 32px rgba(99, 102, 241, 0.3);
            border-color: rgba(99, 102, 241, 0.5);
        }

        .logo-container img {
            transition: transform 0.3s ease;
        }

        .logo-container:hover img {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="hero-gradient tech-grid min-h-screen flex items-center justify-center">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-20 left-1/2 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating" style="animation-delay: 4s;"></div>
    </div>

    <!-- Register Container -->
    <div class="relative z-10 w-full max-w-md mx-auto px-6">
        <div class="glass rounded-2xl p-8">
            <!-- Logo and Title -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center gap-3 mb-6">
                    <div class="w-20 h-20 flex items-center justify-center bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 p-3 logo-container">
                        <img src="{{ asset('images/logo.png') }}" alt="N9AD Logo" class="w-full h-full object-contain">
                    </div>
                    <span class="text-3xl font-bold gradient-text">N9AD</span>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">Create Account</h1>
                <p class="text-gray-400">Join the next-generation accountability platform</p>
            </div>

            <!-- Register Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div class="input-group">
                    <label for="name" class="input-label">Full Name</label>
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        class="input-field" 
                        placeholder="Enter your full name"
                        value="{{ old('name') }}" 
                        required 
                        autofocus 
                        autocomplete="name"
                    >
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="input-group">
                    <label for="email" class="input-label">Email Address</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        class="input-field" 
                        placeholder="you@example.com"
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="username"
                    >
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="input-group">
                    <label for="password" class="input-label">Password</label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        class="input-field" 
                        placeholder="Create a strong password"
                        required 
                        autocomplete="new-password"
                    >
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="input-group">
                    <label for="password_confirmation" class="input-label">Confirm Password</label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        class="input-field" 
                        placeholder="Confirm your password"
                        required 
                        autocomplete="new-password"
                    >
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full btn-primary text-lg py-4">
                    <i class="fas fa-user-plus mr-2"></i>
                    Create Account
                </button>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-6">
                <p class="text-gray-400">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-medium transition">
                        Sign in here
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-gray-500 text-sm">
                © 2025 N9AD. Next-generation accountability platform.
            </p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to inputs
            const inputs = document.querySelectorAll('.input-field');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('transform', 'scale-105');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('transform', 'scale-105');
                });
            });

            // Form validation feedback
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Account...';
                submitBtn.disabled = true;
            });
        });
    </script>
</body>
</html>
