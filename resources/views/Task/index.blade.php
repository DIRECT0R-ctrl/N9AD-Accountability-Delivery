@extends('layouts.app-new')

@section('content')

<section class="py-12">
<div class="max-w-7xl mx-auto px-6">

<!-- Header -->
<div class="flex items-center justify-between mb-8 fade-in mt-8">
    <div>
        <h1 class="text-4xl font-bold">
            Task <span class="gradient-text">Registry</span>
        </h1>
        <p class="text-gray-400">Manage accountability and delivery</p>
    </div>

    <a href="{{'task.create'}}" class="btn-primary">
        <i class="fas fa-plus mr-2"></i>
        New Task
    </a>
</div>


<!-- Tasks Card -->
<div class="glass rounded-2xl p-6 card-hover">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-white">
            All Tasks
        </h2>

        <span class="text-gray-400 text-sm">
            {{ count($tasks) }} tasks
        </span>
    </div>

    <div class="space-y-4">

        @foreach($tasks as $task)

        <div class="flex items-center justify-between
                    p-4
                    bg-gray-800/50
                    rounded-xl
                    border border-gray-700
                    hover:border-indigo-500/50
                    transition-all">

            <!-- Left -->
            <div class="flex items-center space-x-4">

                <div class="w-10 h-10
                            bg-indigo-500/20
                            rounded-lg
                            flex items-center justify-center">
                    <i class="fas fa-tasks text-indigo-400"></i>
                </div>

                <div>
                    <h4 class="text-white font-medium">
                        <a href="{{ route('task.show', $task) }}" class="hover:text-indigo-400">
                            {{ $task->title }}
                        </a> 
                    </h4>

                    <p class="text-gray-400 text-sm">
                        Assigned to {{ $task->assignee->name ?? '—' }}
                    </p>
                </div>

            </div>


            <!-- Right -->
            <div class="flex items-center space-x-3">

                <!-- Status -->
                <span class="
                    px-3 py-1
                    text-xs
                    rounded-full
                    bg-indigo-500/20
                    text-indigo-400
                ">
                    {{ $task->status }}
                </span>

                <!-- Actions -->
                <a href="#"
                   class="text-gray-400 hover:text-white">
                    <i class="fas fa-eye"></i>
                </a>

                <a href="#"
                   class="text-gray-400 hover:text-white">
                    <i class="fas fa-pen"></i>
                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

</div>
</section>

@endsection