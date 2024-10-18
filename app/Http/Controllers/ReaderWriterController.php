<?php

namespace App\Http\Controllers;

use App\Models\ReaderWriter;
use Illuminate\Http\Request;

class ReaderWriterController extends Controller
{
    /**
     * Display a listing of the Reader/Writers.
     */
    public function index()
    {
        $readerWriters = ReaderWriter::all();
        return response()->json($readerWriters);
    }

    /**
     * Store a newly created Reader/Writer in storage.
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

        $readerWriter = ReaderWriter::create($request->all());
        return response()->json($readerWriter, 201); // Created resource
    }

    /**
     * Display the specified Reader/Writer.
     */
    public function show(ReaderWriter $readerWriter)
    {
        return response()->json($readerWriter);
    }

    /**
     * Update the specified Reader/Writer in storage.
     */
    public function update(Request $request, ReaderWriter $readerWriter)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
        ]);

        $readerWriter->update($request->all());
        return response()->json($readerWriter);
    }

    /**
     * Remove the specified Reader/Writer from storage.
     */
    public function destroy(ReaderWriter $readerWriter)
    {
        $readerWriter->delete();
        return response()->json(null, 204); // No content
    }
}
