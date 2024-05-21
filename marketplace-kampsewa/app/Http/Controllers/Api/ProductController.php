<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts() {
        $products = Produk::all();
        return response()->json([
            'products' => $products,
            'message' => 'Success'
        ], 200);
    }

    public function getAllProductsByUserId($userId) {
        $products = Produk::where('id_user', $userId)->get();
        return response()->json([
            'products' => $products,
            'message' => 'Success'
        ], 200);
    }

    public function getProductById($productId) {
        $product = Produk::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json([
            'product' => $product,
            'message' => 'Success'
        ], 200);
    }

    public function getProductByCategory($category) {
        $products = Produk::where('kategori', 'like', '%' . $category . '%' )->get();
        return response()->json([
            'products' => $products,
            'message' => 'Success'
        ], 200);
    }
}
