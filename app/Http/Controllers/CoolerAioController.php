<?php

namespace App\Http\Controllers;

use App\Models\CoolerAio;
use Illuminate\Http\Request;

class CoolerAioController extends Controller
{
    /**
     * Display a listing of the Coolers/AIOs.
     */
    public function index()
    {
        $coolerAios = CoolerAio::all();
        return response()->json($coolerAios);
    }

    /**
     * Show the form for creating a new Cooler/AIO.
     */
    public function create()
    {
        // Return a view for creating Cooler/AIO (if needed).
    }

    /**
     * Store a newly created Cooler/AIO in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:cooler_aios,sku',
        ]);

        $coolerAio = CoolerAio::create($request->all());
        return response()->json($coolerAio, 201); // Created resource
    }

    /**
     * Display the specified Cooler/AIO.
     */
    public function show(CoolerAio $coolerAio)
    {
        return response()->json($coolerAio);
    }

    /**
     * Show the form for editing the specified Cooler/AIO.
     */
    public function edit(CoolerAio $coolerAio)
    {
        // Return a view for editing Cooler/AIO (if needed).
    }

    /**
     * Update the specified Cooler/AIO in storage.
     */
    public function update(Request $request, CoolerAio $coolerAio)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:cooler_aios,sku,' . $coolerAio->id,
        ]);

        $coolerAio->update($request->all());
        return response()->json($coolerAio);
    }

    /**
     * Remove the specified Cooler/AIO from storage.
     */
    public function destroy(CoolerAio $coolerAio)
    {
        $coolerAio->delete();
        return response()->json(null, 204); // No content
    }
}
