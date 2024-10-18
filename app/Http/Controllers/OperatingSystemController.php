<?php

namespace App\Http\Controllers;

use App\Models\OperatingSystem;
use Illuminate\Http\Request;

class OperatingSystemController extends Controller
{
    // Get all operating systems
    public function index()
    {
        return response()->json(OperatingSystem::all(), 200);
    }

    // Store a new operating system
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'sku' => 'required|string|max:255|unique:operating_systems,sku',
        ]);

        $os = OperatingSystem::create($request->all());

        return response()->json($os, 201);
    }

    // Show a specific operating system
    public function show($id)
    {
        $os = OperatingSystem::find($id);

        if (!$os) {
            return response()->json(['message' => 'Operating System not found'], 404);
        }

        return response()->json($os, 200);
    }

    // Update an operating system
    public function update(Request $request, $id)
    {
        $os = OperatingSystem::find($id);

        if (!$os) {
            return response()->json(['message' => 'Operating System not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'sku' => 'sometimes|required|string|max:255|unique:operating_systems,sku,' . $os->id,
        ]);

        $os->update($request->all());

        return response()->json($os, 200);
    }

    // Delete an operating system
    public function destroy($id)
    {
        $os = OperatingSystem::find($id);

        if (!$os) {
            return response()->json(['message' => 'Operating System not found'], 404);
        }

        $os->delete();

        return response()->json(['message' => 'Operating System deleted successfully'], 200);
    }
}
