<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-white leading-tight">
                All Operational Tasks
            </h2>
            <p class="text-sm text-zinc-500 mono uppercase tracking-widest">Total: {{ $tasks->count() }}</p>
        </div>
    </x-slot>

    <div class="bg-zinc-900/50 border border-zinc-800 rounded-2xl overflow-hidden backdrop-blur-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-zinc-800 bg-zinc-900/80">
                    <th class="p-4 text-xs font-mono text-zinc-500 uppercase tracking-wider">Reference</th>
                    <th class="p-4 text-xs font-mono text-zinc-500 uppercase tracking-wider">Task Title</th>
                    <th class="p-4 text-xs font-mono text-zinc-500 uppercase tracking-wider">Status</th>
                    <th class="p-4 text-xs font-mono text-zinc-500 uppercase tracking-wider">Priority</th>
                    <th class="p-4 text-xs font-mono text-zinc-500 uppercase tracking-wider">Assignee</th>
                    <th class="p-4 text-xs font-mono text-zinc-500 uppercase tracking-wider">Deadline</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-zinc-800">
                @forelse ($tasks as $task)
                <tr class="hover:bg-zinc-800/30 transition-colors group">
                    <!-- Reference -->
                    <td class="p-4">
                        <span class="text-[10px] mono text-zinc-600 font-bold">#{{ str_pad($task->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </td>

                    <!-- Title -->
                    <td class="p-4">
                        <div class="text-sm font-medium text-white group-hover:text-blue-400 transition-colors">
                            {{ $task->title }}
                        </div>
                        <div class="text-xs text-zinc-500 truncate max-w-[200px]">{{ $task->description }}</div>
                    </td>

                    <!-- Status Badge -->
                    <td class="p-4">
                        @php
                            $statusColors = [
                                'pending' => 'bg-zinc-800 text-zinc-400 border-zinc-700',
                                'in_progress' => 'bg-amber-500/10 text-amber-500 border-amber-500/20',
                                'submitted' => 'bg-blue-500/10 text-blue-500 border-blue-500/20',
                                'validated' => 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20',
                                'rejected' => 'bg-rose-500/10 text-rose-500 border-rose-500/20',
                            ];
                        @endphp
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider border {{ $statusColors[$task->status] ?? 'bg-zinc-800 text-zinc-400' }}">
                            {{ str_replace('_', ' ', $task->status) }}
                        </span>
                    </td>

                    <!-- Priority -->
                    <td class="p-4">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full {{ $task->priority === 'urgent' ? 'bg-rose-500 animate-pulse' : ($task->priority === 'high' ? 'bg-amber-500' : 'bg-zinc-600') }}"></div>
                            <span class="text-xs capitalize {{ $task->priority === 'urgent' ? 'text-rose-500 font-bold' : 'text-zinc-400' }}">
                                {{ $task->priority }}
                            </span>
                        </div>
                    </td>

                    <!-- Assignee -->
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="h-7 w-7 rounded-full bg-zinc-800 border border-zinc-700 flex items-center justify-center text-[10px] font-bold text-white uppercase">
                                {{ substr($task->assignee->name ?? '?', 0, 2) }}
                            </div>
                            <span class="text-xs text-zinc-300">{{ $task->assignee->name ?? 'Unassigned' }}</span>
                        </div>
                    </td>

                    <!-- Deadline -->
                    <td class="p-4">
                        <div class="text-xs {{ $task->deadline < now() ? 'text-rose-500 font-bold' : 'text-zinc-400' }}">
                            {{ $task->deadline->format('M d, Y') }}
                        </div>
                        <div class="text-[10px] text-zinc-600 mono uppercase">{{ $task->deadline->diffForHumans() }}</div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-20 text-center">
                        <div class="text-zinc-600 italic">No tasks found in the Accountability Engine.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>