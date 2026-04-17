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

<div class="flex items-center justify-between mb-6">
    <h2 class="text-xl font-bold text-white">
        Delivery Proof
    </h2>
</div>


@if($task->proof)

<div class="bg-gray-900/50 rounded-xl p-6 border border-gray-700">

<p class="text-gray-300 italic mb-4">
"{{ $task->proof->comment }}"
</p>

<div class="text-xs text-gray-500">
Submitted {{ $task->proof->created_at->diffForHumans() }}
</div>

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

<button class="w-full py-3 glass border border-gray-700 hover:border-gray-500 rounded-xl transition">
Validate Delivery
</button>

<button class="w-full py-3 glass border border-gray-700 hover:border-gray-500 rounded-xl transition">
Reject Protocol
</button>

@endif

<button class="w-full py-3 glass border border-gray-700 hover:border-gray-500 rounded-xl transition">
Edit Task
</button>

</div>

@endif

</div>
</div>
</div>
</section>

@endsection