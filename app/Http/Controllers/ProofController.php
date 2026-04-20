<?php

namespace App\Http\Controllers;

use App\Models\Proof;
use Illuminate\Http\Request;

class ProofController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proof_file' => 'required|file|mims:jpg,png,pdf|max:5120',
            'comment' => 'required|string|min:10'
        ]);


        $path = $request->file('proof_file')->store('proofs', 'public');

        // DB::transaction()
        app('db')->transaction(function() use ($task, $path, $request) {

            $task->proof()->create([
                'proof_file' => $path,
                'comment' => $request->comment,
            ]);

            $task->update(['status' => 'submitted']);
        });

        return redirect()->route('task.show', $task)->with('success', 'evidence logged , protocolsa status: submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proof $proof)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proof $proof)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proof $proof)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proof $proof)
    {
        //
    }
}
