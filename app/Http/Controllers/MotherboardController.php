<?php

namespace App\Http\Controllers;

use App\Models\Motherboard;
use Illuminate\Http\Request;

class MotherboardController extends Controller
{
    // Get all motherboards
    public function index()
    {
        return response()->json(Motherboard::all(), 200);
    }
   // Store a new motherboard
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'required|string|max:255|unique:motherboards,sku',
            'category' => 'nullable|string|max:255', // Validate category
        ]);

        $motherboard = Motherboard::create($request->all());

        return response()->json($motherboard, 201);
    }
 


    // Show a specific motherboard
    public function show($id)
    {
        $motherboard = Motherboard::find($id);

        if (!$motherboard) {
            return response()->json(['message' => 'Motherboard not found'], 404);
        }

        return response()->json($motherboard, 200);
    }

    // Update a motherboard
    public function update(Request $request, $id)
    {
        $motherboard = Motherboard::find($id);

        if (!$motherboard) {
            return response()->json(['message' => 'Motherboard not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'sometimes|required|string|max:255|unique:motherboards,sku,' . $motherboard->id,
            'category' => 'nullable|string|max:255', // Validate category
        ]);

        $motherboard->update($request->all());

        return response()->json($motherboard, 200);
    }

    // Delete a motherboard
    public function destroy($id)
    {
        $motherboard = Motherboard::find($id);

        if (!$motherboard) {
            return response()->json(['message' => 'Motherboard not found'], 404);
        }

        $motherboard->delete();

        return response()->json(['message' => 'Motherboard deleted successfully'], 200);
    }
}
