<?php

namespace App\Http\Controllers;

use App\Models\CaseFan;
use Illuminate\Http\Request;

class CaseFanController extends Controller
{
    /**
     * Display a listing of the Case Fans.
     */
    public function index()
    {
        $caseFans = CaseFan::all();
        return response()->json($caseFans);
    }

    /**
     * Store a newly created Case Fan in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:case_fans,sku',
        ]);

        $caseFan = CaseFan::create($request->all());
        return response()->json($caseFan, 201); // Created resource
    }

    /**
     * Display the specified Case Fan.
     */
    public function show(CaseFan $caseFan)
    {
        return response()->json($caseFan);
    }

    /**
     * Update the specified Case Fan in storage.
     */
    public function update(Request $request, CaseFan $caseFan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:case_fans,sku,' . $caseFan->id,
        ]);

        $caseFan->update($request->all());
        return response()->json($caseFan);
    }

    /**
     * Remove the specified Case Fan from storage.
     */
    public function destroy(CaseFan $caseFan)
    {
        $caseFan->delete();
        return response()->json(null, 204); // No content
    }
}
