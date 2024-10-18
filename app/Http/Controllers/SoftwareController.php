<?php

namespace App\Http\Controllers;

use App\Models\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the Software.
     */
    public function index()
    {
        $software = Software::all();
        return response()->json($software);
    }

    /**
     * Store a newly created Software in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:software,sku',
        ]);

        $software = Software::create($request->all());
        return response()->json($software, 201); // Created resource
    }

    /**
     * Display the specified Software.
     */
    public function show(Software $software)
    {
        return response()->json($software);
    }

    /**
     * Update the specified Software in storage.
     */
    public function update(Request $request, Software $software)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:software,sku,' . $software->id,
        ]);

        $software->update($request->all());
        return response()->json($software);
    }

    /**
     * Remove the specified Software from storage.
     */
    public function destroy(Software $software)
    {
        $software->delete();
        return response()->json(null, 204); // No content
    }
}
