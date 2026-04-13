<x-app-layout>
    <x-slot name="title">My Dashboard | N9AD</x-slot>

    <!-- STATS STRIP -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">
        <div class="glass p-4 rounded-2xl border-l-2 border-l-emerald-500">
            <p class="text-[10px] uppercase font-bold text-zinc-500 tracking-widest">Efficiency</p>
            <p class="text-2xl font-bold text-white mt-1">94.2%</p>
        </div>
        <!-- Copy other stat cards here -->
    </div>

    <!-- TASK LIST -->
    <div class="space-y-3">
        <!-- We will replace this with a @foreach later when we have the database -->
        <div class="glass p-4 rounded-xl flex items-center justify-between hover:bg-zinc-900/50 transition-all border-l-4 border-l-transparent">
             <h3 class="text-white font-medium text-sm">Implement Auth System</h3>
             <button @click="showModal = true" class="bg-blue-600 px-3 py-1 rounded text-white text-xs">Submit Proof</button>
        </div>
    </div>
</x-app-layout>
