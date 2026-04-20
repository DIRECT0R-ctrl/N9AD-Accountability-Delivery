@extends('layouts.app-new')

@section('content')

<section class="py-8">
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

<a href="{{ route('task.show', $task) }}" class="block">
    <div class="glass rounded-xl p-5 flex justify-between items-center hover:bg-white/5 transition">

        <div>
            <p class="font-semibold text-white">
                {{ $task->title }}
            </p>

            <p class="text-sm text-gray-400">
                from {{ $task->creator->name }}
            </p>
        </div>

        <div class="text-sm text-gray-400 capitalize">
            {{ $task->status }}
        </div>

    </div>
</a>

@endforeach

</div>
<!-- tasks -->

</section>

@endsection