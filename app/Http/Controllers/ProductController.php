<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mendapatkan semua produk
        $products = Product::all();

        return response()->json(["data" => $products]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "nameProduct" => "required",
            "stock"       => "required|numeric|min:1",
            "price"       => "required|numeric|min:1",
            "campaign_id" => "required|exists:campaigns,id",
        ]);

        $product = Product::create([
            "productID"   => strtoupper(substr($request->input("nameProduct"), 0, 3)) . rand(1000, 9999),
            "nameProduct" => $request->input("nameProduct"),
            "stock"       => $request->input("stock"),
            "price"       => $request->input("price"),
            "campaign_id" => $request->input("campaign_id"),
        ]);

        return response()->json(["message" => "Product created successfully", "data" => $product], 201);
    }


    public function update(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            "nameProduct" => "required",
            "stock"       => "required|numeric|min:1",
            "price"       => "required|numeric|min:1",
        ]);

        try {
            // Find product by ID
            $product = Product::findOrFail($id);

            // Update product attributes
            $product->update([
                "name_product" => $request->input("nameProduct"),
                "stock"        => $request->input("stock"),
                "price"        => $request->input("price"),
            ]);

            return response()->json(["message" => "Product updated successfully", "data" => $product]);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        // Mencari produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Menghapus produk
        $product->delete();

        return response()->json(["message" => "Product deleted successfully"]);
    }
}
