<?php

namespace App\Http\Controllers;

use App\Models\Ssd;
use Illuminate\Http\Request;

class SsdController extends Controller
{
    /**
     * Display a listing of the SSDs.
     */
    public function index()
    {
        $ssds = Ssd::all();
        return response()->json($ssds);
    }

    /**
     * Show the form for creating a new SSD.
     */
    public function create()
    {
        // Return a view for creating SSD (if needed).
    }

    /**
     * Store a newly created SSD in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:ssds,sku',
        ]);

        $ssd = Ssd::create($request->all());
        return response()->json($ssd, 201); // Created resource
    }

    /**
     * Display the specified SSD.
     */
    public function show(Ssd $ssd)
    {
        return response()->json($ssd);
    }

    /**
     * Show the form for editing the specified SSD.
     */
    public function edit(Ssd $ssd)
    {
        // Return a view for editing SSD (if needed).
    }

    /**
     * Update the specified SSD in storage.
     */
    public function update(Request $request, Ssd $ssd)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:ssds,sku,' . $ssd->id,
        ]);

        $ssd->update($request->all());
        return response()->json($ssd);
    }

    /**
     * Remove the specified SSD from storage.
     */
    public function destroy(Ssd $ssd)
    {
        $ssd->delete();
        return response()->json(null, 204); // No content
    }
}
