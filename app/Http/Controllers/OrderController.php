<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return Order::with('product')->get(); // Return all orders with product information
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0', // Amount must be a positive number
            'status' => 'required|string',
            'customer' => 'required|string|max:255',
        ]);

        $order = Order::create($request->all()); // Create a new order

        return response()->json($order, Response::HTTP_CREATED); // Return the created order
    }

    // Display the specified resource.
    public function show(Order $order)
    {
        return $order->load('product'); // Return the specified order with product information
    }

    // Update the specified resource in storage.
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'description' => 'sometimes|nullable|string',
            'amount' => 'sometimes|required|numeric|min:0',
            'status' => 'sometimes|required|string',
            'customer' => 'sometimes|required|string|max:255',
        ]);

        $order->update($request->all()); // Update the order

        return response()->json($order); // Return the updated order
    }

    // Remove the specified resource from storage.
    public function destroy(Order $order)
    {
        $order->delete(); // Delete the order

        return response()->json(null, Response::HTTP_NO_CONTENT); // Return 204 No Content
    }
}
