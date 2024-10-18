<?php

namespace App\Http\Controllers;

use App\Models\SoundCard;
use Illuminate\Http\Request;

class SoundCardController extends Controller
{
    /**
     * Display a listing of the Sound Cards.
     */
    public function index()
    {
        $soundCards = SoundCard::all();
        return response()->json($soundCards);
    }

    /**
     * Store a newly created Sound Card in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:sound_cards,sku',
        ]);

        $soundCard = SoundCard::create($request->all());
        return response()->json($soundCard, 201); // Created resource
    }

    /**
     * Display the specified Sound Card.
     */
    public function show(SoundCard $soundCard)
    {
        return response()->json($soundCard);
    }

    /**
     * Update the specified Sound Card in storage.
     */
    public function update(Request $request, SoundCard $soundCard)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:sound_cards,sku,' . $soundCard->id,
        ]);

        $soundCard->update($request->all());
        return response()->json($soundCard);
    }

    /**
     * Remove the specified Sound Card from storage.
     */
    public function destroy(SoundCard $soundCard)
    {
        $soundCard->delete();
        return response()->json(null, 204); // No content
    }
}
