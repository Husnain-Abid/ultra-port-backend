<?php

namespace App\Http\Controllers;

use App\Models\WiFi;
use Illuminate\Http\Request;

class WiFiController extends Controller
{
    /**
     * Display a listing of the Wi-Fi devices.
     */
    public function index()
    {
        $wiFis = WiFi::all();
        return response()->json($wiFis);
    }

    /**
     * Store a newly created Wi-Fi device in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:wi_fis,sku',
        ]);

        $wiFi = WiFi::create($request->all());
        return response()->json($wiFi, 201); // Created resource
    }

    /**
     * Display the specified Wi-Fi device.
     */
    public function show(WiFi $wiFi)
    {
        return response()->json($wiFi);
    }

    /**
     * Update the specified Wi-Fi device in storage.
     */
    public function update(Request $request, WiFi $wiFi)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'sku' => 'required|string|unique:wi_fis,sku,' . $wiFi->id,
        ]);

        $wiFi->update($request->all());
        return response()->json($wiFi);
    }

    /**
     * Remove the specified Wi-Fi device from storage.
     */
    public function destroy(WiFi $wiFi)
    {
        $wiFi->delete();
        return response()->json(null, 204); // No content
    }
}
