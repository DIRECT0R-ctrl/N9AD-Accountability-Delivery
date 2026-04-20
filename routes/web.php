<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProofController;
Route::get('/', function () {
    return view('landing');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/dashboard', [App\Http\Controllers\TaskController::class, 'index'])->name('admin.dashboard');

//Route::get('/employee/dashboard', [Task])



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::resource('/task', TaskController::class);
    // Route::post('task', [TaskController::class,'edit'])->name('tesk.update');
    Route::post('/task{task}/proof', [ProofController::class, 'store'])->name('proof.store');
});




require __DIR__.'/auth.php';
