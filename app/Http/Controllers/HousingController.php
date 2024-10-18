<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use Illuminate\Http\Request;

class HousingController extends Controller
{
    // Get all housings
    public function index()
    {
        return response()->json(Housing::all(), 200);
    }

    // Store a new housing
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string|max:255', // Image URL validation
            'description' => 'nullable|string',
            'sku' => 'required|string|max:255|unique:housings,sku',
            'category' => 'nullable|string|max:255', // Validate category
        ]);

        $housing = Housing::create($request->all());

        return response()->json($housing, 201);
    }

    // Show a specific housing
    public function show($id)
    {
        $housing = Housing::find($id);

        if (!$housing) {
            return response()->json(['message' => 'Housing not found'], 404);
        }

        return response()->json($housing, 200);
    }

    // Update a housing
    public function update(Request $request, $id)
    {
        $housing = Housing::find($id);

        if (!$housing) {
            return response()->json(['message' => 'Housing not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'sometimes|required|string|max:255|unique:housings,sku,' . $housing->id,
            'category' => 'nullable|string|max:255', // Validate category
        ]);

        $housing->update($request->all());

        return response()->json($housing, 200);
    }

    // Delete a housing
    public function destroy($id)
    {
        $housing = Housing::find($id);

        if (!$housing) {
            return response()->json(['message' => 'Housing not found'], 404);
        }

        $housing->delete();

        return response()->json(['message' => 'Housing deleted successfully'], 200);
    }
}
