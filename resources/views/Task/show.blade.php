@extends('layouts.app-new')

@section('content')

<section class="min-h-screen flex items-center justify-center pt-20">
<div class="w-full max-w-7xl">

<!-- Breadcrumb -->
<div class="flex items-center gap-4 mb-8 text-sm mt-8 pt-15">
    <a href="{{ route('task.index') }}" 
       class="text-gray-500 hover:text-white transition flex items-center gap-2">
        ← Back to Registry
    </a>

    <span class="text-gray-700">/</span>

    <span class="text-gray-400 uppercase tracking-widest text-xs">
        Protocol #{{ str_pad($task->id,4,'0',STR_PAD_LEFT) }}
    </span>
</div>


<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

<!-- LEFT -->
<div class="lg:col-span-2 space-y-6">

<!-- TASK HEADER -->
<div class="glass rounded-2xl p-8 card-hover">
    <h1 class="text-3xl font-bold text-white mb-4">
        {{ $task->title }}
    </h1>

    <p class="text-gray-400 leading-relaxed">
        {{ $task->description }}
    </p>
</div>


<!-- PROOF SECTION -->
<div class="glass rounded-2xl p-8 card-hover">

<!-- <div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-white">
        Delivery Proof
    </h2>
</div> -->

@if(auth()->user()->isEmployee() 
    && auth()->id() === $task->assignee_id 
    && $task->status !== 'submitted' 
    && $task->status !== 'validated')

<div class="border border-dashed border-gray-700 rounded-xl p-6">

<h3 class="text-lg font-bold text-white mb-4">
Submit Delivery Proof
</h3>

<form action="{{ route('proof.store', $task) }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="space-y-5">

@csrf

<!-- File -->
<div>
<label class="text-xs text-gray-500 uppercase tracking-widest block mb-2">
Attachment (Image / PDF)
</label>

<input type="file" 
       enctype="multipart/form-data"
       name="file_path" 
       required
       class="w-full bg-gray-900 border border-gray-700 rounded-xl p-3 text-gray-300 focus:border-gray-500 outline-none">
</div>

<!-- Comment -->
<div>
<label class="text-xs text-gray-500 uppercase tracking-widest block mb-2">
Comment
</label>

<textarea name="comment"
          rows="3"
          required
          class="w-full bg-gray-900 border border-gray-700 rounded-xl p-3 text-white focus:border-gray-500 outline-none"></textarea>
</div>

<button type="submit"
class="w-full py-3 glass border border-gray-700 hover:border-gray-500 rounded-xl transition text-white">
Submit Proof
</button>

</form>

</div>

@endif

@if($task->proof)
    <!-- Wrapper with Alpine.js state -->
    <div x-data="{ showArtifact: false }" class="relative">
        
        <p class="text-[10px] mono uppercase text-zinc-500 tracking-widest mb-3">Evidence Log</p>

        <!-- The Clickable Hotzone -->
        <div @click="showArtifact = true" 
             class="group bg-zinc-900/50 rounded-2xl p-6 border border-zinc-800 hover:border-blue-500/50 hover:bg-zinc-800/50 transition-all cursor-zoom-in relative overflow-hidden">
            
            <!-- Visual hint: a subtle glow on hover -->
            <div class="absolute inset-0 bg-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>

            <div class="relative z-10">
                <p class="text-zinc-300 italic mb-4 leading-relaxed">
                    "{{ $task->proof->comment }}"
                </p>

                <div class="flex items-center justify-between">
                    <div class="text-[10px] text-zinc-500 mono uppercase tracking-tighter">
                        Submitted {{ $task->proof->created_at->diffForHumans() }}
                    </div>
                    <div class="text-[10px] text-blue-500 font-bold uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-all">
                        Click to Inspect Artifact →
                    </div>
                </div>
            </div>
        </div>

        <!-- THE FLOATING TERMINAL (Lightbox) -->
        <template x-teleport="body">
            <div x-show="showArtifact" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 backdrop-blur-xl p-6 md:p-12"
                 @click="showArtifact = false"
                 @keydown.escape.window="showArtifact = false">
                
                <!-- Close Hint -->
                <div class="absolute top-8 right-8 text-zinc-500 text-xs mono uppercase tracking-widest pointer-events-none">
                    Esc to close / Click anywhere to exit
                </div>

                <!-- The Artifact Container -->
                <div class="relative max-w-5xl max-h-full" @click.stop>
                    <img src="{{ Storage::url($task->proof->file_path) }}" 
                         x-show="showArtifact"
                         x-transition:enter="transition ease-out duration-500 delay-100"
                         x-transition:enter-start="scale-95 translate-y-4 opacity-0"
                         x-transition:enter-end="scale-100 translate-y-0 opacity-100"
                         class="rounded-3xl shadow-2xl border border-zinc-800 object-contain max-h-[85vh] w-auto mx-auto"
                         alt="Submission Artifact">
                    
                    <!-- Metadata Overlay on Image -->
                    <div class="absolute bottom-6 left-6 right-6 p-4 glass rounded-2xl border-white/5 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                            <span class="text-[10px] text-white mono uppercase tracking-widest">Protocol Verified Artifact</span>
                        </div>
                        <a href="{{ Storage::url($task->proof->file_path) }}" target="_blank" class="text-[10px] text-zinc-400 hover:text-white font-bold transition-colors">
                            DOWNLOAD RAW FILE
                        </a>
                    </div>
                </div>
            </div>
        </template>
    </div>

@else

@if(auth()->id() === $task->assignee_id && $task->status === 'in_progress')

<div class="text-center py-10 border border-dashed border-gray-700 rounded-xl">

<p class="text-gray-400 mb-6">
No proof submitted yet
</p>

<button class="btn-primary">
Submit Delivery Proof
</button>

</div>

@else

<div class="text-center py-10">
<p class="text-gray-500 italic">
Awaiting delivery...
</p>
</div>

@endif

@endif

</div>
</div>


<!-- RIGHT SIDEBAR -->
<div class="space-y-6">

<div class="glass rounded-2xl p-6">

<h3 class="text-xs text-gray-500 uppercase tracking-widest mb-6">
Task Metadata
</h3>

<div class="space-y-5">

<div class="flex justify-between">
<span class="text-gray-500 text-xs">Status</span>
<span class="text-white text-sm capitalize">
{{ str_replace('_',' ',$task->status) }}
</span>
</div>

<div class="flex justify-between">
<span class="text-gray-500 text-xs">Priority</span>
<span class="text-white text-sm capitalize">
{{ $task->priority }}
</span>
</div>

<div class="flex justify-between border-t border-gray-700 pt-4">
<span class="text-gray-500 text-xs">Deadline</span>

<div class="text-right">
<p class="text-white text-sm">
{{ $task->deadline->format('M d, Y') }}
</p>

<p class="text-gray-500 text-xs">
{{ $task->deadline->diffForHumans() }}
</p>
</div>
</div>

<div class="flex justify-between border-t border-gray-700 pt-4">
<span class="text-gray-500 text-xs">Assignee</span>

<span class="text-white text-sm">
{{ $task->assignee->name }}
</span>
</div>

</div>

</div>


@if(auth()->user()->isManager() || auth()->user()->isAdmin())

<div class="space-y-3">

@if($task->status === 'submitted')
<div class="flex gap-4 mt-8">
        <!-- Approve -->
        <form action="{{ route('task.validate', $task) }}" method="POST" class="flex-1">
            @csrf
            @method('PATCH')
            
            <button class="w-full py-4 bg-emerald-600 hover:bg-emerald-500 text-white rounded-2xl font-bold shadow-lg shadow-emerald-900/20 transition-all">
                APPROVE DELIVERY
            </button>

 </form>

        <!-- Reject -->
        <form action="{{ route('task.reject', $task) }}" method="POST" class="flex-1">
            @csrf
            @method('PATCH')
            <button class="w-full py-4 bg-zinc-800 hover:bg-rose-900/50 text-rose-500 rounded-2xl font-bold border border-zinc-700 transition-all">
                Reject Protocol
            </button>
        </form>
    </div>

@endif

<a href="{{ route('task.edit', $task) }}" class="mt-3" 
class="w-full py-3 glass border border-gray-700 hover:border-gray-500 rounded-xl transition">
Edit Task
</a>

</div>

@endif

</div>
</div>
</div>
</section>

@endsection

<!-- EMPLOYEE PROOF PREVIEW -->
@if($task->proof && auth()->id() === $task->assignee_id)
    <div class="glass rounded-2xl p-6 border border-zinc-800 mt-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-bold text-white uppercase tracking-widest mono">My Submission</h3>
            <span class="text-[10px] text-zinc-500 mono">{{ $task->proof->created_at->diffForHumans() }}</span>
        </div>

        @if($task->proof && auth()->id() === $task->assignee_id)
        <div class="flex gap-6 items-start">
            <!-- Artifact Thumbnail -->
            <div class="w-32 h-32 rounded-xl bg-zinc-950 border border-zinc-800 overflow-hidden shrink-0">
                <img src="{{ Storage::url($task->proof->file_path) }}" 
                     class="w-full h-full object-cover opacity-70 hover:opacity-100 transition-opacity cursor-pointer">
            </div>

            <!-- Commentary -->
            <div class="flex-1">
                <p class="text-xs font-mono text-zinc-500 uppercase mb-2">Commentary Log</p>
                <div class="bg-zinc-900/50 rounded-lg p-4 border border-zinc-800 text-zinc-300 text-sm italic">
                    "{{ $task->proof->comment }}"
                </div>
                <div class="mt-4">
                    <a href="{{ Storage::url($task->proof->file_path) }}" target="_blank" class="text-[10px] text-blue-500 hover:text-blue-400 font-bold uppercase tracking-tighter">
                        Open Full Protocol File →
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
@endif