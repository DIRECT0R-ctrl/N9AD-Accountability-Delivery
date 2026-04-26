<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller implements HasMiddleware
{
    /*public function __construct() {}*/
    public static function middleware()
    {
        return [
             new Middleware(function ($request, $next) {
                if (!auth()->user()->isAdmin()) {
                    abort(403, 'System Protocol: Administrative clearance required.');
                }
                return $next($request);
            }),
        ];

    }

    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::all();
        return view('Admin.users', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return back()->with('success', 'User provisioned into the system.');
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update($data);
        return back()->with('success', 'User clearance updated.');
    }

    public function destroy(User $user)
    {
        // Architect's Safety: Don't delete yourself!
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Self-termination protocol denied.');
        }

        $user->delete();
        return back()->with('success', 'User revoked from system.');
    }
}
