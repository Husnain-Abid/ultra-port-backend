<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    /**
     * Display a listing of the RAMs.
     */
    public function index()
    {
        $rams = Ram::all();
        return response()->json($rams);
    }

    /**
     * Show the form for creating a new RAM.
     */
    public function create()
    {
        // Return a view or form for creating RAM (if needed).
    }

    /**
     * Store a newly created RAM in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:rams,sku',
        ]);

        $ram = Ram::create($request->all());
        return response()->json($ram, 201); // Return created resource
    }

    /**
     * Display the specified RAM.
     */
    public function show(Ram $ram)
    {
        return response()->json($ram);
    }

    /**
     * Show the form for editing the specified RAM.
     */
    public function edit(Ram $ram)
    {
        // Return a view or form for editing RAM (if needed).
    }

    /**
     * Update the specified RAM in storage.
     */
    public function update(Request $request, Ram $ram)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:rams,sku,' . $ram->id,
        ]);

        $ram->update($request->all());
        return response()->json($ram);
    }

    /**
     * Remove the specified RAM from storage.
     */
    public function destroy(Ram $ram)
    {
        $ram->delete();
        return response()->json(null, 204); // No content
    }
}
