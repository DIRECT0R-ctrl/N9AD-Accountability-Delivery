@extends('layouts.app-new')

@section('content')

<section class="py-8">
<div class="max-w-5xl mx-auto">

<!-- Header -->
<div class="mb-8 fade-in">
<h1 class="text-4xl font-bold">
Create <span class="gradient-text">Task</span>
</h1>

<p class="text-gray-400">
Initialize accountability protocol
</p>
</div>

<!-- Card -->
<div class="glass rounded-2xl p-8 card-hover">

<form method="POST" action="{{ route('task.store') }}" class="space-y-6">
@csrf

<!-- title -->
<div>
<label class="text-sm text-gray-400">Task Title</label>

<input type="text"
name="title"
class="w-full mt-2 bg-gray-900 border border-gray-700 rounded-lg p-3 text-white focus:border-indigo-500"
required>
</div>


<!-- description -->
<div>
<label class="text-sm text-gray-400">Description</label>

<textarea
name="description"
rows="4"
class="w-full mt-2 bg-gray-900 border border-gray-700 rounded-lg p-3 text-white focus:border-indigo-500"
></textarea>
</div>


<!-- assignee -->
<div>
<label class="text-sm text-gray-400">Assign To</label>

<select name="assignee_id"
class="w-full mt-2 bg-gray-900 border border-gray-700 rounded-lg p-3 text-white">

@foreach($employees as $user)
<option value="{{ $user->id }}">
{{ $user->name }}
</option>
@endforeach

</select>
</div>


<!-- priority -->
<div>
<label class="text-sm text-gray-400">Priority</label>

<select name="priority"
class="w-full mt-2 bg-gray-900 border border-gray-700 rounded-lg p-3 text-white">

<option value="low">Low</option>
<option value="medium">Medium</option>
<option value="high">High</option>
<option value="urgent">Urgent</option>

</select>
</div>


<!-- deadline -->
<div>
<label class="text-sm text-gray-400">Deadline</label>

<input type="date"
name="deadline"
class="w-full mt-2 bg-gray-900 border border-gray-700 rounded-lg p-3 text-white">
</div>


<!-- button -->
<div class="pt-4">
<button class="btn-primary w-full">
Create Task
</button>
</div>

</form>

</div>
</div>
</section>

@endsection