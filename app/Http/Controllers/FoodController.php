<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the Foods.
     */
    public function index()
    {
        $foods = Food::all();
        return response()->json($foods);
    }

    /**
     * Store a newly created Food in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
        ]);

        $food = Food::create($request->all());
        return response()->json($food, 201); // Created resource
    }

    /**
     * Display the specified Food.
     */
    public function show(Food $food)
    {
        return response()->json($food);
    }

    /**
     * Update the specified Food in storage.
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
        ]);

        $food->update($request->all());
        return response()->json($food);
    }

    /**
     * Remove the specified Food from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return response()->json(null, 204); // No content
    }
}
