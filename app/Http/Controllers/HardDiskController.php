<?php

namespace App\Http\Controllers;

use App\Models\HardDisk;
use Illuminate\Http\Request;

class HardDiskController extends Controller
{
    /**
     * Display a listing of the Hard Disks.
     */
    public function index()
    {
        $hardDisks = HardDisk::all();
        return response()->json($hardDisks);
    }

    /**
     * Show the form for creating a new Hard Disk.
     */
    public function create()
    {
        // Return a view for creating a Hard Disk (if needed).
    }

    /**
     * Store a newly created Hard Disk in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:hard_disks,sku',
        ]);

        $hardDisk = HardDisk::create($request->all());
        return response()->json($hardDisk, 201); // Created resource
    }

    /**
     * Display the specified Hard Disk.
     */
    public function show(HardDisk $hardDisk)
    {
        return response()->json($hardDisk);
    }

    /**
     * Show the form for editing the specified Hard Disk.
     */
    public function edit(HardDisk $hardDisk)
    {
        // Return a view for editing a Hard Disk (if needed).
    }

    /**
     * Update the specified Hard Disk in storage.
     */
    public function update(Request $request, HardDisk $hardDisk)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:hard_disks,sku,' . $hardDisk->id,
        ]);

        $hardDisk->update($request->all());
        return response()->json($hardDisk);
    }

    /**
     * Remove the specified Hard Disk from storage.
     */
    public function destroy(HardDisk $hardDisk)
    {
        $hardDisk->delete();
        return response()->json(null, 204); // No content
    }
}
