<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use Illuminate\Http\Request;

class ScreenController extends Controller
{
    /**
     * Display a listing of the Screens.
     */
    public function index()
    {
        $screens = Screen::all();
        return response()->json($screens);
    }

    /**
     * Store a newly created Screen in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:screens,sku',
        ]);

        $screen = Screen::create($request->all());
        return response()->json($screen, 201); // Created resource
    }

    /**
     * Display the specified Screen.
     */
    public function show(Screen $screen)
    {
        return response()->json($screen);
    }

    /**
     * Update the specified Screen in storage.
     */
    public function update(Request $request, Screen $screen)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:screens,sku,' . $screen->id,
        ]);

        $screen->update($request->all());
        return response()->json($screen);
    }

    /**
     * Remove the specified Screen from storage.
     */
    public function destroy(Screen $screen)
    {
        $screen->delete();
        return response()->json(null, 204); // No content
    }
}
