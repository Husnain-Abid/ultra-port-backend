<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return Review::with('product')->get(); // Return all reviews with product information
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'stars' => 'required|integer|min:1|max:5', // Star rating must be between 1 and 5
            'nickname' => 'required|string|max:100',
            'summary' => 'required|string|max:255',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($request->all()); // Create a new review

        return response()->json($review, Response::HTTP_CREATED); // Return the created review
    }

    // Display the specified resource.
    public function show(Review $review)
    {
        return $review->load('product'); // Return the specified review with product information
    }

    // Update the specified resource in storage.
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'stars' => 'sometimes|required|integer|min:1|max:5',
            'nickname' => 'sometimes|required|string|max:100',
            'summary' => 'sometimes|required|string|max:255',
            'comment' => 'sometimes|nullable|string',
        ]);

        $review->update($request->all()); // Update the review

        return response()->json($review); // Return the updated review
    }

    // Remove the specified resource from storage.
    public function destroy(Review $review)
    {
        $review->delete(); // Delete the review

        return response()->json(null, Response::HTTP_NO_CONTENT); // Return 204 No Content
    }
}
