<?php

namespace App\Http\Controllers;

use App\Models\Processor;
use Illuminate\Http\Request;

class ProcessorController extends Controller
{
    // Get all processors
    public function index()
    {
        return response()->json(Processor::all(), 200);
    }

    // Store a new processor
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|string|max:255', // Image URL validation
            'description' => 'nullable|string',
            'sku' => 'required|string|max:255|unique:processors,sku',
        ]);

        $processor = Processor::create($request->all());

        return response()->json($processor, 201);
    }

    // Show a specific processor
    public function show($id)
    {
        $processor = Processor::find($id);

        if (!$processor) {
            return response()->json(['message' => 'Processor not found'], 404);
        }

        return response()->json($processor, 200);
    }

    // Update a processor
    public function update(Request $request, $id)
    {
        $processor = Processor::find($id);

        if (!$processor) {
            return response()->json(['message' => 'Processor not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sku' => 'sometimes|required|string|max:255|unique:processors,sku,' . $processor->id,
        ]);

        $processor->update($request->all());

        return response()->json($processor, 200);
    }

    // Delete a processor
    public function destroy($id)
    {
        $processor = Processor::find($id);

        if (!$processor) {
            return response()->json(['message' => 'Processor not found'], 404);
        }

        $processor->delete();

        return response()->json(['message' => 'Processor deleted successfully'], 200);
    }
}
