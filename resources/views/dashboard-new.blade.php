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
        <!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <!-- Total Tasks Link -->
    <a href="{{ route('task.index') }}" class="glass rounded-2xl p-6 card-hover group transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-500/20 group-hover:bg-blue-500 rounded-xl flex items-center justify-center transition-colors">
                <i class="fas fa-tasks text-blue-400 group-hover:text-white"></i>
            </div>
            <div class="w-3 h-3 bg-blue-500 rounded-full pulse"></div>
        </div>
        <h3 class="text-2xl font-bold text-white mb-1">{{ $stats['total_tasks'] }}</h3>
        <p class="text-gray-400 text-sm font-mono uppercase tracking-tighter">Registry Total</p>
    </a>

    <!-- Pending Link -->
    <a href="{{ route('task.index', ['status' => 'pending']) }}" class="glass rounded-2xl p-6 card-hover group transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-amber-500/20 group-hover:bg-amber-500 rounded-xl flex items-center justify-center transition-colors">
                <i class="fas fa-clock text-amber-400 group-hover:text-white"></i>
            </div>
            <div class="w-3 h-3 bg-amber-500 rounded-full pulse"></div>
        </div>
        <h3 class="text-2xl font-bold text-white mb-1">{{ $stats['pending_tasks'] }}</h3>
        <p class="text-gray-400 text-sm font-mono uppercase tracking-tighter">Awaiting Initial</p>
    </a>

    <!-- Completed/Validated Link -->
    <a href="{{ route('task.index', ['status' => 'validated']) }}" class="glass rounded-2xl p-6 card-hover group transition-all">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-500/20 group-hover:bg-green-500 rounded-xl flex items-center justify-center transition-colors">
                <i class="fas fa-check-circle text-green-400 group-hover:text-white"></i>
            </div>
            <div class="w-3 h-3 bg-green-500 rounded-full pulse"></div>
        </div>
        <h3 class="text-2xl font-bold text-white mb-1">{{ $stats['completed_tasks'] }}</h3>
        <p class="text-gray-400 text-sm font-mono uppercase tracking-tighter">Protocol Success</p>
    </a>

    <!-- In Progress / Employees -->
    <div class="glass rounded-2xl p-6 border-zinc-800">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-{{ auth()->user()->isManager() ? 'users' : 'spinner' }} text-purple-400"></i>
            </div>
        </div>
        <h3 class="text-2xl font-bold text-white mb-1">
            {{ auth()->user()->isManager() ? ($stats['total_employees'] ?? 0) : $stats['in_progress_tasks'] }}
        </h3>
        <p class="text-gray-400 text-sm font-mono uppercase tracking-tighter">
            {{ auth()->user()->isManager() ? 'Active Personnel' : 'Active Protocol' }}
        </p>
    </div>
</div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Tasks -->
            <div class="lg:col-span-2 space-y-6">
                <div class="glass rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white">
                            {{ auth()->user()->isManager() ? 'All Tasks' : 'My Tasks' }}
                        </h2>
                        <a href="{{ route('task.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm font-medium">
                            View All <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <div class="space-y-4">
                        @forelse($tasks as $task)
                        <div class="flex items-center justify-between p-4 bg-gray-800/50 rounded-xl border border-gray-700 hover:border-indigo-500/50 transition-all">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-tasks text-blue-400"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-medium">{{ $task->title }}</h4>
                                    <p class="text-gray-400 text-sm">
                                        @if(auth()->user()->isManager())
                                            Assigned to: {{ $task->assignee->name }}
                                        @else
                                            Created by: {{ $task->creator->name }}
                                        @endif
                                        {{ $task->deadline ? '· Due: ' . $task->deadline->format('M j, Y') : '' }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 bg-{{ $task->status === 'completed' ? 'green' : ($task->status === 'in_progress' ? 'amber' : 'blue') }}-500/20 text-{{ $task->status === 'completed' ? 'green' : ($task->status === 'in_progress' ? 'amber' : 'blue') }}-400 text-xs rounded-full">
                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                </span>
                                <button class="text-gray-400 hover:text-white">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <i class="fas fa-inbox text-4xl text-gray-600 mb-4"></i>
                            <p class="text-gray-400">
                                @if(auth()->user()->isManager())
                                    No tasks found. Create your first task!
                                @else
                                    No tasks assigned to you yet.
                                @endif
                            </p>
                        </div>
                        @endforelse
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
                <div class="space-y-3">
    <!-- Changed <button> to <a> and added href -->
    <a href="{{ route('task.create') }}" class="w-full py-3 px-4 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl font-medium hover:shadow-lg transition-all flex items-center justify-center">
        <i class="fas fa-plus mr-2"></i> New Task
    </a>

    <button class="w-full py-3 px-4 bg-gray-800 text-white rounded-xl font-medium hover:bg-gray-700 transition-all">
        <i class="fas fa-users mr-2"></i> Invite Team
    </button>
    
    <button class="w-full py-3 px-4 bg-gray-800 text-white rounded-xl font-medium hover:bg-gray-700 transition-all">
        <i class="fas fa-download mr-2"></i> Export Report
    </button>
</div>

                @if(auth()->user()->isManager() && isset($employees))
                <!-- Team Members -->
                <div class="glass rounded-2xl p-6">
                    <h2 class="text-xl font-bold text-white mb-4">Team Members</h2>
                    <div class="space-y-3">
                        @forelse($employees as $employee)
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                {{ substr($employee->name, 0, 1) }}
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">{{ $employee->name }}</p>
                                <p class="text-gray-400 text-sm">{{ ucfirst($employee->role->name) }}</p>
                            </div>
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        </div>
                        @empty
                        <p class="text-gray-400 text-sm">No employees found.</p>
                        @endforelse
                    </div>
                </div>
            @endif

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
