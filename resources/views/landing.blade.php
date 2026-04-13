@extends('layouts.app-new')

@section('content')

<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center relative overflow-hidden tech-grid">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-20 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating" style="animation-delay: 2s;"></div>
        <div class="absolute bottom-20 left-1/2 w-80 h-80 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 floating" style="animation-delay: 4s;"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <div class="fade-in">
            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 border border-indigo-500/20 rounded-full mb-8">
                <span class="text-indigo-400 text-sm font-medium"> ~ Introducing N9AD v1.0</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                <span class="text-white">Accountability</span><br>
                <span class="gradient-text text-glow">Reimagined</span>
            </h1>

            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
                Transform your team's productivity with AI-powered task management, 
                real-time accountability tracking, and seamless collaboration tools.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <button class="btn-primary text-lg px-8 py-4">
                    Start Free Trial
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
                <button class="px-8 py-4 border border-gray-600 rounded-lg text-white hover:bg-gray-800 transition">
                    <i class="fas fa-play mr-2"></i>
                    Watch Demo
                </button>
            </div>

            <div class="flex items-center justify-center space-x-8 text-gray-400">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <span>No credit card required</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <span>14-day free trial</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    <span>Cancel anytime</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="animate-bounce">
            <i class="fas fa-chevron-down text-gray-400 text-2xl"></i>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 relative">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                Built for <span class="gradient-text">Modern Teams</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Powerful features that scale with your business and drive results
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="glass rounded-2xl p-8 card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-robot text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">AI-Powered Insights</h3>
                <p class="text-gray-300 mb-4">
                    Machine learning algorithms analyze your team's performance and provide actionable insights to optimize productivity.
                </p>
                <a href="#" class="text-indigo-400 hover:text-indigo-300 font-medium">
                    Learn more <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Feature 2 -->
            <div class="glass rounded-2xl p-8 card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Real-time Analytics</h3>
                <p class="text-gray-300 mb-4">
                    Track progress, monitor performance, and make data-driven decisions with our comprehensive dashboard.
                </p>
                <a href="#" class="text-indigo-400 hover:text-indigo-300 font-medium">
                    Learn more <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>

            <!-- Feature 3 -->
            <div class="glass rounded-2xl p-8 card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-red-600 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-white mb-4">Team Collaboration</h3>
                <p class="text-gray-300 mb-4">
                    Seamless communication and collaboration tools that keep your team aligned and productive.
                </p>
                <a href="#" class="text-indigo-400 hover:text-indigo-300 font-medium">
                    Learn more <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section id="how-it-works" class="py-20 bg-gradient-to-b from-transparent to-gray-900/50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                How <span class="gradient-text">It Works</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Get started in minutes and transform your team's productivity
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                    1
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Sign Up</h3>
                <p class="text-gray-300">Create your account in seconds</p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                    2
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Invite Team</h3>
                <p class="text-gray-300">Add your team members</p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                    3
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Create Tasks</h3>
                <p class="text-gray-300">Set up projects and tasks</p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-4 text-white text-2xl font-bold">
                    4
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Track Progress</h3>
                <p class="text-gray-300">Monitor and optimize performance</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">
                Simple <span class="gradient-text">Pricing</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Choose the perfect plan for your team size and needs
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Starter Plan -->
            <div class="glass rounded-2xl p-8 card-hover">
                <h3 class="text-2xl font-bold text-white mb-2">Starter</h3>
                <p class="text-gray-300 mb-6">Perfect for small teams</p>
                <div class="text-4xl font-bold text-white mb-6">
                    $29<span class="text-lg text-gray-400">/month</span>
                </div>
                <ul class="space-y-3 mb-8 text-gray-300">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Up to 10 users
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Basic analytics
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Email support
                    </li>
                </ul>
                <button class="w-full py-3 border border-gray-600 rounded-lg text-white hover:bg-gray-800 transition">
                    Get Started
                </button>
            </div>

            <!-- Pro Plan -->
            <div class="glass rounded-2xl p-8 card-hover border-2 border-indigo-500 relative">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-1 rounded-full text-sm font-medium">
                        Most Popular
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">Pro</h3>
                <p class="text-gray-300 mb-6">For growing businesses</p>
                <div class="text-4xl font-bold text-white mb-6">
                    $99<span class="text-lg text-gray-400">/month</span>
                </div>
                <ul class="space-y-3 mb-8 text-gray-300">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Up to 50 users
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Advanced analytics
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Priority support
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Custom integrations
                    </li>
                </ul>
                <button class="w-full btn-primary">
                    Get Started
                </button>
            </div>

            <!-- Enterprise Plan -->
            <div class="glass rounded-2xl p-8 card-hover">
                <h3 class="text-2xl font-bold text-white mb-2">Enterprise</h3>
                <p class="text-gray-300 mb-6">For large organizations</p>
                <div class="text-4xl font-bold text-white mb-6">
                    Custom<span class="text-lg text-gray-400"></span>
                </div>
                <ul class="space-y-3 mb-8 text-gray-300">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Unlimited users
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Custom analytics
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        24/7 phone support
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-500 mr-3"></i>
                        Dedicated account manager
                    </li>
                </ul>
                <button class="w-full py-3 border border-gray-600 rounded-lg text-white hover:bg-gray-800 transition">
                    Contact Sales
                </button>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-600 opacity-10"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            Ready to Transform Your Team?
        </h2>
        <p class="text-xl text-gray-300 mb-8">
            Join thousands of teams already using N9AD to boost productivity and accountability.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="btn-primary text-lg px-8 py-4">
                Start Free Trial
            </button>
            <button class="px-8 py-4 border border-gray-600 rounded-lg text-white hover:bg-gray-800 transition">
                Schedule Demo
            </button>
        </div>
    </div>
</section>

@endsection
