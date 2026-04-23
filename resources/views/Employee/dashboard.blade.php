@extends('layouts.app-new')

@section('content')

<section class="py-8">
<div class="max-w-5xl mx-auto px-8 mt-8 pt-8">

<!-- header -->
<div class="mb-8">
<h1 class="text-4xl font-bold">
My <span class="gradient-text">Tasks</span>
</h1>

<p class="text-gray-400">
Your assigned protocols
</p>
</div>


<div class="space-y-4">

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

</div>
</section>

@endsection