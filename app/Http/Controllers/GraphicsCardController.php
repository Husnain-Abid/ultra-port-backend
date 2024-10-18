<?php

namespace App\Http\Controllers;

use App\Models\GraphicsCard;
use Illuminate\Http\Request;

class GraphicsCardController extends Controller
{
    // Get all graphics cards
    public function index()
    {
        return response()->json(GraphicsCard::all(), 200);
    }

    // Store a new graphics card
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string|max:255', // Image URL validation
            'description' => 'nullable|string',
            'sku' => 'required|string|max:255|unique:graphics_cards,sku',
            'category' => 'nullable|string|max:255', // Validate category
        ]);

        $graphicsCard = GraphicsCard::create($request->all());

        return response()->json($graphicsCard, 201);
    }

    // Show a specific graphics card
    public function show($id)
    {
        $graphicsCard = GraphicsCard::find($id);

        if (!$graphicsCard) {
            return response()->json(['message' => 'Graphics Card not found'], 404);
        }

        return response()->json($graphicsCard, 200);
    }

    // Update a graphics card
    public function update(Request $request, $id)
    {
        $graphicsCard = GraphicsCard::find($id);

        if (!$graphicsCard) {
            return response()->json(['message' => 'Graphics Card not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'sometimes|required|string|max:255|unique:graphics_cards,sku,' . $graphicsCard->id,
            'category' => 'nullable|string|max:255', // Validate category
        ]);

        $graphicsCard->update($request->all());

        return response()->json($graphicsCard, 200);
    }

    // Delete a graphics card
    public function destroy($id)
    {
        $graphicsCard = GraphicsCard::find($id);

        if (!$graphicsCard) {
            return response()->json(['message' => 'Graphics Card not found'], 404);
        }

        $graphicsCard->delete();

        return response()->json(['message' => 'Graphics Card deleted successfully'], 200);
    }
}
