<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();
        if ($user->isEmployee())
        {
            $tasks = Task::with(['creator', 'assigne'])->where('assignee_id', $user->id)
                ->latest()
                ->get();
        } else { 

            $tasks = Task::with('creator', 'assignee')->latest()
                ->get();
        }
        $employees = User::where('role_id', 3)->get();

        return view('Task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {

        if (auth()->user()->isEmployee())
        {
            abort(403);
        }

        $employees = User::where('role_id', 3)->get();

        return view('Task.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assignee_id' => 'required|exists:users,id',
            'priority' => 'required|in:low,medium,high,urgent',
            'deadline' => 'required|date|after:today',
        ]);

        $validated['creator_id'] = auth()->id();
        $validated['status'] = 'pending';

        Task::create($validated);

        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load(['creator', 'assignee', 'proof']);

        return view('Task.show', compact('task'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
