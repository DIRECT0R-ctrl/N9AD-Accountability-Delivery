@extends('layouts.app-new')

@section('content')

<!-- Dashboard Hero -->
<section class="py-12 mt-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="mb-8 fade-in">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                Welcome back, <span class="gradient-text">{{ Auth::user()->name }}</span>
            </h1>
            <p class="text-xl text-gray-300">Your accountability dashboard is ready</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="glass rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-tasks text-white"></i>
                    </div>
                    <div class="w-3 h-3 bg-green-500 rounded-full pulse"></div>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">24</h3>
                <p class="text-gray-400 text-sm">Total Tasks</p>
            </div>

            <div class="glass rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div class="w-3 h-3 bg-amber-500 rounded-full pulse"></div>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">6</h3>
                <p class="text-gray-400 text-sm">Pending</p>
            </div>

            <div class="glass rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-check-circle text-white"></i>
                    </div>
                    <div class="w-3 h-3 bg-green-500 rounded-full pulse"></div>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">18</h3>
                <p class="text-gray-400 text-sm">Completed</p>
            </div>

            <div class="glass rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-line text-white"></i>
                    </div>
                    <div class="w-3 h-3 bg-green-500 rounded-full pulse"></div>
                </div>
                <h3 class="text-2xl font-bold text-white mb-1">98%</h3>
                <p class="text-gray-400 text-sm">Efficiency</p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Tasks -->
            <div class="lg:col-span-2 space-y-6">
                <div class="glass rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white">Recent Tasks</h2>
                        <a href="{{ route('task.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-xl border border-gray-700 hover:border-indigo-500/50 transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-code text-blue-400"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Website Redesign</h4>
                                    <p class="text-gray-400 text-sm">Due in 2 days</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 bg-amber-500/20 text-amber-400 text-xs rounded-full">In Progress</span>
                                <button class="text-gray-400 hover:text-white">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-xl border border-gray-700 hover:border-indigo-500/50 transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-database text-green-400"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Database Migration</h4>
                                    <p class="text-gray-400 text-sm">Completed yesterday</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs rounded-full">Completed</span>
                                <button class="text-gray-400 hover:text-white">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-xl border border-gray-700 hover:border-indigo-500/50 transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-mobile-alt text-purple-400"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">Mobile App Development</h4>
                                    <p class="text-gray-400 text-sm">Due next week</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-400 text-xs rounded-full">Planning</span>
                                <button class="text-gray-400 hover:text-white">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Chart -->
                <div class="glass rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-white mb-6">Activity Overview</h2>
                    <div class="h-64 flex items-center justify-center bg-gray-800/50 rounded-xl">
                        <div class="text-center">
                            <i class="fas fa-chart-area text-4xl text-indigo-400 mb-4"></i>
                            <p class="text-gray-400">Interactive chart coming soon</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="glass rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-white mb-4">Quick Actions</h2>
                    <div class="space-y-3">
                        <button class="w-full py-3 px-4 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all">
                            <i class="fas fa-plus mr-2"></i> New Task
                        </button>
                        <button class="w-full py-3 px-4 bg-gray-800 text-white rounded-xl font-medium hover:bg-gray-700 transition-all">
                            <i class="fas fa-users mr-2"></i> Invite Team
                        </button>
                        <button class="w-full py-3 px-4 bg-gray-800 text-white rounded-xl font-medium hover:bg-gray-700 transition-all">
                            <i class="fas fa-download mr-2"></i> Export Report
                        </button>
                    </div>
                </div>

                <!-- Team Members -->
                <div class="glass rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-white mb-4">Team Members</h2>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-white font-medium">John Doe</p>
                                <p class="text-gray-400 text-sm">Developer</p>
                            </div>
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-teal-600 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Jane Smith</p>
                                <p class="text-gray-400 text-sm">Designer</p>
                            </div>
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full"></div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Mike Johnson</p>
                                <p class="text-gray-400 text-sm">Manager</p>
                            </div>
                            <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                        </div>
                    </div>
                </div>

                <!-- System Status -->
                <div class="glass rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-white mb-4">System Status</h2>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">API</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-green-400 text-sm">Online</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Database</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-green-400 text-sm">Connected</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-400">Storage</span>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                                <span class="text-amber-400 text-sm">78% Used</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
