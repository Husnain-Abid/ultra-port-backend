<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    // Display a listing of the resource.
    public function index()
    {
        $products = Product::with([
            'ram',
            'coolerAios',
            'ssd',
            'hardDisk',
            'readerWriter',
            'motherboard',
            'graphicsCard',
        ])->get()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'image' => $product->image,
                'price' => $product->price,
                'old_price' => $product->old_price,    // New field
                'delivery_time' => $product->delivery_time,  // New field
                'images' => $product->images,    // New field (JSON)
                'sku' => $product->sku,
                'features' => array_filter([  // Grouping all features in an array
                    $product->ram ? $product->ram->name : null,
                    $product->coolerAios ? $product->coolerAios->name : null,
                    $product->ssd ? $product->ssd->name : null,
                    $product->hardDisk ? $product->hardDisk->name : null,
                    $product->readerWriter ? $product->readerWriter->name : null,
                    $product->motherboard ? $product->motherboard->name : null,
                    $product->graphicsCard ? $product->graphicsCard->name : null,
                ]),
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
            ];
        });

        return response()->json($products);
    }




    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric', // Validate old price
            'delivery_time' => 'nullable|integer', // Validate delivery time
            'images' => 'nullable|array', // Validate multiple images as an array
            'images.*' => 'string', // Each image in the array must be a string (url or path)
            'sku' => 'nullable|string|max:100',
            // Add validation rules for foreign keys and other fields as needed

        ]);

        // Modify the request data to encode the images array as JSON
        if ($request->has('images')) {
            $request->merge([
                'images' => json_encode($request->images), // Convert array to JSON
            ]);
        }


        // Store the new product
        $product = Product::create($request->all());

        return response()->json($product, Response::HTTP_CREATED);
    }

    // Display the specified resource.
    public function show(Product $product)
    {
        // Load relationships
        $product->load([
            'ram',
            'coolerAios',
            'ssd',
            'hardDisk',
            'readerWriter',
            'motherboard',
            'graphicsCard',
        ]);

        // Build the response data
        $response = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->image,
            'price' => $product->price,
'old_price' => $product->old_price,    // New field
                'delivery_time' => $product->delivery_time,  // New field
                'images' => $product->images,    // New field (JSON)


            'sku' => $product->sku,
            'features' => array_filter([
                'Système d\'exploitation' => $product->operatingSystems ? $product->operatingSystems->name : null,
                'Processeur' => $product->processors ? $product->processors->name : null,
                'Carte mère' => $product->motherboard ? $product->motherboard->name : null,
                'Carte graphique' => $product->graphicsCard ? $product->graphicsCard->name : null,
                'Boîtier' => $product->housings ? $product->housings->name : null,
                'Ventilateur de boîtier' => $product->caseFan ? $product->caseFan->name : null,
                'RAM' => $product->ram ? $product->ram->name : null,
                'Refroidisseur AIO' => $product->coolerAios ? $product->coolerAios->name : null,
                'SSD' => $product->ssd ? $product->ssd->name : null,
                'Disque dur' => $product->hardDisk ? $product->hardDisk->name : null,
                'Lecteur graveur' => $product->readerWriter ? $product->readerWriter->name : null,
            ]),
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
        ];

        return response()->json($response);
    }


    // Update the specified resource in storage.
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'sometimes|required|numeric',
            'old_price' => 'nullable|numeric', // Validate old price
            'delivery_time' => 'nullable|integer', // Validate delivery time
            'images' => 'nullable|array', // Validate multiple images as an array
            'images.*' => 'string', // Each image in the array must be a string (url or path)
            'sku' => 'nullable|string|max:100',
            // Other fields as needed...
        ]);

        // Modify the request data to encode the images array as JSON if present
        if ($request->has('images')) {
            $request->merge([
                'images' => json_encode($request->images), // Convert array to JSON
            ]);
        }

        // Update the product with the validated data
        $product->update($request->all());

        return response()->json($product);
    }


    // Remove the specified resource from storage.
    public function destroy(Product $product)
    {
        $product->delete(); // Delete the product

        return response()->json(null, Response::HTTP_NO_CONTENT); // Return 204 No Content
    }
}
