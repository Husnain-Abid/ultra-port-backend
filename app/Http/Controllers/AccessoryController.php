<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the Accessories.
     */
    public function index()
    {
        $accessories = Accessory::all();
        return response()->json($accessories);
    }

    /**
     * Store a newly created Accessory in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:accessories,sku',
        ]);

        $accessory = Accessory::create($request->all());
        return response()->json($accessory, 201); // Created resource
    }

    /**
     * Display the specified Accessory.
     */
    public function show(Accessory $accessory)
    {
        return response()->json($accessory);
    }

    /**
     * Update the specified Accessory in storage.
     */
    public function update(Request $request, Accessory $accessory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:accessories,sku,' . $accessory->id,
        ]);

        $accessory->update($request->all());
        return response()->json($accessory);
    }

    /**
     * Remove the specified Accessory from storage.
     */
    public function destroy(Accessory $accessory)
    {
        $accessory->delete();
        return response()->json(null, 204); // No content
    }
}
