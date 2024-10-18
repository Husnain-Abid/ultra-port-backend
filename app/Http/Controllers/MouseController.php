<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use Illuminate\Http\Request;

class MouseController extends Controller
{
    /**
     * Display a listing of the Mice.
     */
    public function index()
    {
        $mice = Mouse::all();
        return response()->json($mice);
    }

    /**
     * Store a newly created Mouse in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:mice,sku',
        ]);

        $mouse = Mouse::create($request->all());
        return response()->json($mouse, 201); // Created resource
    }

    /**
     * Display the specified Mouse.
     */
    public function show(Mouse $mouse)
    {
        return response()->json($mouse);
    }

    /**
     * Update the specified Mouse in storage.
     */
    public function update(Request $request, Mouse $mouse)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:mice,sku,' . $mouse->id,
        ]);

        $mouse->update($request->all());
        return response()->json($mouse);
    }

    /**
     * Remove the specified Mouse from storage.
     */
    public function destroy(Mouse $mouse)
    {
        $mouse->delete();
        return response()->json(null, 204); // No content
    }
}
