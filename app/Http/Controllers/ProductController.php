<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }
    public function show($id)
    {
        return Product::find($id);
    }
    public function store(Request $request)
    {
        $product = $request->validate([
            'title' => 'required|string',
            'images' => 'required|string',
            'likes' => 'required'
        ]);
        Product::create($product);
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string',
            'images' => 'sometimes|required|string',
            'likes' => 'sometimes|required|integer'
        ]);
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }
        $product->update($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ], 404);
        }
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], 200);
    }
}
