<x-app-layout>

    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white mb-2">System Dashboard</h1>
        <p class="text-zinc-400">Accountability engine overview and operational metrics</p>
    </div>

    <!-- Metrics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">

        <!-- Total Tasks -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="text-xs text-zinc-500 font-mono uppercase tracking-wider">Total Tasks</div>
                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
            </div>
            <div class="text-2xl font-bold text-white mb-1">24</div>
            <div class="text-xs text-zinc-500">Active workload</div>
        </div>

        <!-- Pending -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="text-xs text-zinc-500 font-mono uppercase tracking-wider">Pending</div>
                <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
            </div>
            <div class="text-2xl font-bold text-white mb-1">6</div>
            <div class="text-xs text-zinc-500">Awaiting execution</div>
        </div>

        <!-- Completed -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="text-xs text-zinc-500 font-mono uppercase tracking-wider">Validated</div>
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
            </div>
            <div class="text-2xl font-bold text-white mb-1">18</div>
            <div class="text-xs text-zinc-500">Successfully delivered</div>
        </div>

        <!-- System Health -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="text-xs text-zinc-500 font-mono uppercase tracking-wider">Health</div>
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            </div>
            <div class="text-2xl font-bold text-green-500 mb-1">98%</div>
            <div class="text-xs text-zinc-500">Operational</div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- System Status Panel -->
        <div class="lg:col-span-2 bg-zinc-900 border border-zinc-800 rounded-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-semibold text-white">System Status</h2>
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-xs text-green-500 font-mono">ONLINE</span>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between py-3 border-b border-zinc-800">
                    <div>
                        <div class="text-sm font-medium text-white">Accountability Engine</div>
                        <div class="text-xs text-zinc-500">Core processing module</div>
                    </div>
                    <div class="text-xs text-green-500 font-mono">ACTIVE</div>
                </div>

                <div class="flex items-center justify-between py-3 border-b border-zinc-800">
                    <div>
                        <div class="text-sm font-medium text-white">Task Queue</div>
                        <div class="text-xs text-zinc-500">Processing pipeline</div>
                    </div>
                    <div class="text-xs text-amber-500 font-mono">6 PENDING</div>
                </div>

                <div class="flex items-center justify-between py-3 border-b border-zinc-800">
                    <div>
                        <div class="text-sm font-medium text-white">Validation System</div>
                        <div class="text-xs text-zinc-500">Proof verification</div>
                    </div>
                    <div class="text-xs text-green-500 font-mono">OPERATIONAL</div>
                </div>

                <div class="flex items-center justify-between py-3">
                    <div>
                        <div class="text-sm font-medium text-white">Database</div>
                        <div class="text-xs text-zinc-500">PostgreSQL v14.2</div>
                    </div>
                    <div class="text-xs text-green-500 font-mono">CONNECTED</div>
                </div>
            </div>
        </div>

        <!-- Activity Feed -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-6">
            <h2 class="text-lg font-semibold text-white mb-6">Activity Log</h2>

            <div class="space-y-4">
                <div class="pb-3 border-b border-zinc-800">
                    <div class="flex items-start justify-between mb-1">
                        <div class="text-sm text-zinc-300">Task submitted</div>
                        <div class="text-xs text-zinc-500 mono">14:32</div>
                    </div>
                    <div class="text-xs text-zinc-500">"Website audit" added to queue</div>
                </div>

                <div class="pb-3 border-b border-zinc-800">
                    <div class="flex items-start justify-between mb-1">
                        <div class="text-sm text-zinc-300">Proof validated</div>
                        <div class="text-xs text-zinc-500 mono">14:24</div>
                    </div>
                    <div class="text-xs text-zinc-500">Manager approved completion</div>
                </div>

                <div class="pb-3 border-b border-zinc-800">
                    <div class="flex items-start justify-between mb-1">
                        <div class="text-sm text-zinc-300">Task assigned</div>
                        <div class="text-xs text-zinc-500 mono">14:09</div>
                    </div>
                    <div class="text-xs text-zinc-500">New task allocated to team</div>
                </div>

                <div class="pb-3">
                    <div class="flex items-start justify-between mb-1">
                        <div class="text-sm text-zinc-300">System update</div>
                        <div class="text-xs text-zinc-500 mono">13:45</div>
                    </div>
                    <div class="text-xs text-zinc-500">Engine v1.0.0 deployed</div>
                </div>
            </div>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="mt-8 bg-zinc-900 border border-zinc-800 rounded-lg p-6">
        <h2 class="text-lg font-semibold text-white mb-4">Quick Actions</h2>
        <div class="flex gap-3">
            <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-md transition-colors">
                New Task
            </button>
            <button class="px-4 py-2 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-sm rounded-md transition-colors">
                View All Tasks
            </button>
            <button class="px-4 py-2 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-sm rounded-md transition-colors">
                System Report
            </button>
        </div>
    </div>

</x-app-layout>