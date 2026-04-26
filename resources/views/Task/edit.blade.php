@extends('layouts.app-new')

@section('content')

<section class="min-h-screen pt-8 mt-8">
<div class="max-w-5xl mx-auto px-6">

<!-- header -->
<div class="mb-8">
<h1 class="text-3xl font-bold text-white">
Edit <span class="gradient-text">Task</span>
</h1>

<p class="text-gray-400">
Modify protocol settings
</p>
</div>
@error('error')
    <p>{{ $message }}</p>
@enderror
<form method="POST" action="{{ route('task.update', $task->id) }}">
@csrf
@method('PATCH')

<div class="glass rounded-2xl p-8 space-y-6">

<!-- title -->
<div>
<label class="text-sm text-gray-400 block mb-2">
Title
</label>

<input type="text"
name="title"
value="{{ old('title', $task->title) }}"
class="w-full glass rounded-xl px-4 py-3 text-white border border-gray-700 focus:border-gray-500 outline-none">
</div>

<!-- description -->
<div>
<label class="text-sm text-gray-400 block mb-2">
Description
</label>

<textarea
name="description"
rows="4"
class="w-full glass rounded-xl px-4 py-3 text-white border border-gray-700 focus:border-gray-500 outline-none">{{ old('description', $task->description) }}</textarea>
</div>

<!-- assignee -->
<div>
<label class="text-sm text-gray-400 block mb-2">
Assign to
</label>

<select name="assignee_id"
class="w-full glass rounded-xl px-4 py-3 text-white border border-gray-700">

@foreach($employees as $employee)
<option value="{{ $employee->id }}"
@if($task->assignee_id == $employee->id) selected @endif>
{{ $employee->name }}
</option>
@endforeach

</select>
</div>

<!-- priority -->
<div>
<label class="text-sm text-gray-400 block mb-2">
Priority
</label>

<select name="priority"
class="w-full glass rounded-xl px-4 py-3 text-white border border-gray-700">

@foreach(['low','medium','high','urgent'] as $p)
<option value="{{ $p }}"
@if($task->priority == $p) selected @endif>
{{ ucfirst($p) }}
</option>
@endforeach

</select>
</div>

<!-- deadline -->
<div>
<label class="text-sm text-gray-400 block mb-2">
Deadline
</label>

<input type="date"
name="deadline"
value="{{ $task->deadline->format('Y-m-d') }}"
class="w-full glass rounded-xl px-4 py-3 text-white border border-gray-700">
</div>

</div>

<!-- buttons -->
<div class="flex gap-4 mt-6">

<a href="{{ route('task.show',$task) }}"
class="flex-1 py-3 text-center glass border border-gray-700 rounded-xl">
Cancel
</a>

<button type="submit"
class="flex-1 py-3 btn-primary rounded-xl">
Update Task
</button>

</div>

</form>

</div>
</section>

@endsection