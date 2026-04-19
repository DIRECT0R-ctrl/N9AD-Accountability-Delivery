<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard based on user role.
     */
    public function index(): View
    {
        $user = auth()->user();
        
        if ($user->isManager()) {
            // manager kishf gae les task dial tous les eomployee
            $tasks = Task::with(['creator', 'assignee'])->get();
            $stats = $this->getManagerStats($tasks);
            $employees = User::whereHas('role', function($query) {
                $query->where('name', 'employee');
            })->get();
            
            return view('dashboard-new', compact('tasks', 'stats', 'employees'));
            
        } elseif ($user->isEmployee()) {
            // employee kishof just the task assigned to him
            $tasks = Task::with(['creator', 'assignee'])
                         ->where('assignee_id', $user->id)
                         ->get();
            $stats = $this->getEmployeeStats($tasks);
            
            return view('Employee/dashboard', compact('tasks', 'stats'));
        }
        
        // duaf fallback admin wla others roles 
        $tasks = Task::with(['creator', 'assignee'])->get();
        $stats = $this->getManagerStats($tasks);
        
        return view('dashboard-new', compact('tasks', 'stats'));
    }
    
    /**
     * Get statistics for manager dashboard.
     */
    private function getManagerStats($tasks)
    {
        return [
            'total_tasks' => $tasks->count(),
            'pending_tasks' => $tasks->where('status', 'pending')->count(),
            'in_progress_tasks' => $tasks->where('status', 'in_progress')->count(),
            'completed_tasks' => $tasks->whereIn('status', ['validated', 'submitted'])->count(),
            'total_employees' => User::whereHas('role', function($query) {
                $query->where('name', 'employee');
            })->count(),
        ];
    }
    
    /**
     * Get statistics for employee dashboard.
     */
    private function getEmployeeStats($tasks)
    {
        return [
            'total_tasks' => $tasks->count(),
            'pending_tasks' => $tasks->where('status', 'pending')->count(),
            'in_progress_tasks' => $tasks->where('status', 'in_progress')->count(),
            'completed_tasks' => $tasks->whereIn('status', ['validated', 'submitted'])->count(),
        ];
    }
}
