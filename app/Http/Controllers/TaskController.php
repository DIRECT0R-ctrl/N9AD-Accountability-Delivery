<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use function PHPUnit\Framework\throwException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();

        if ($user->isEmployee()) {
            return $this->employeeDashboard($user);
        }

        return $this->managerDashboard($user);
    }

    private function employeeDashboard($user)
    {
        $tasks = Task::where('assignee_id', $user->id)
            ->with('creator')
            ->latest()
            ->get();

        return view('Employee.dashboard', compact('tasks'));
    }

    private function managerDashboard($user)
    {
        $tasks = Task::with('assignee')->latest()->get();

        $stats = [
            'total' => $tasks->count(),
            'pending' => $tasks->where('status', 'pending')->count(),
            'in_progress' => $tasks->where('status', 'in_progress')->count(),
            'submitted' => $tasks->where('status', 'submitted')->count(),
            'validated' => $tasks->where('status', 'validated')->count(),
        ];

        return view('Manager.dashboard', compact('tasks', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {

        if (auth()->user()->isEmployee()) {
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
    /*private function authorizeManager()
    {
        if (auth()->user()->isEmployee()) {
            abort(403, 'Protocol Error: Manager clearance required.');
        }
    }*/

    public function edit(Task $task)
    {
        abort_if(auth()->user()->isEmployee(), 403, 'protocol, error L Manager clearance.');
        $employees = User::where('role_id', 3)->get();

        return view('Task.edit', compact('task', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $tasks = Task::with('assignee')->latest()->get();
        // dd(auth()->user()->isManager());
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'assignee_id' => 'required|exists:users,id',
            'priority' => 'required',
            'deadline' => 'required|date',
            ]);
            $data['creator_id'] = auth()->id();
                $data['status'] = 'pending';
            
            
        // dd($dqt = $task->update($data));

        if($task->update($data))
        {
            return redirect()->route('task.show', $task)->with('success','protocol updated');
        }

        return back()->with('error','protocol does not updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
    }

    public function validateTask(Request $request, Task $task)
    {
        abort_if(auth()->user()->isEmployee(), 403, 'protocol denied ur not allowed');

        $task->update(['status' => 'validated']);

        return back()->with('success','protocol validated, archive updated');
    }

    public function rejectTask(Request $request, Task $task)
    {
        abort_if(auth()->user()->isEmployee(), 403, 'protocol deniad ur not allowed');

        $task->update,(['status'=> 'rejected']);

        return back()->with('success', 'protocol rejected , revision requiredas');
    }
}
