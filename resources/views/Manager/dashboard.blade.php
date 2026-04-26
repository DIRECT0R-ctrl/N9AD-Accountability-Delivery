@extends('layouts.app-new')

@section('content')

<section class="py-8 pt-8 mt-8">
<div class="max-w-7xl mx-auto px-6">

<!-- header -->
<div class="mb-8">
<h1 class="text-4xl font-bold">
Command <span class="gradient-text">Center</span>
</h1>

<p class="text-gray-400">
Operational overview & team control
</p>
</div>

<div class="flex flex-col gap-4">
    
<!-- stats -->
@foreach($tasks as $task)

<div class="glass rounded-xl p-5 flex justify-between items-center hover:bg-white/5 transition">

    <!-- LEFT -->
    <a href="{{ route('task.show', $task) }}" class="block flex-1">
        <div>
            <p class="font-semibold text-white">
                {{ $task->title }}
            </p>

            <p class="text-sm text-gray-400">
                from {{ $task->creator->name }}
            </p>
        </div>
    </a>

    <!-- RIGHT -->
    <div class="flex items-center gap-4">

        <div class="text-sm text-gray-400 capitalize">
            {{ $task->status }}
        </div>

        <!-- delete button -->
        <form action="{{ route('task.destroy', $task) }}" 
              method="POST"
              onsubmit="return confirm('Delete this task?')">
            @csrf
            @method('DELETE')

            <button class="text-gray-500 hover:text-rose-500 transition">
                <i class="fas fa-trash"></i>
            </button>
        </form>

    </div>

</div>

@endforeach

</div>
<!-- tasks -->

</section>

@endsection