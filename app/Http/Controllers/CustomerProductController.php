<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all products
        {
            $query = $request->input('query');

            // Retrieve products based on the search query
            if ($query) {
                $products = Product::whereHas('laptop', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })->orWhereHas('component', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })->orWhereHas('accessories', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })->get();
            } else {
                $products = Product::all();
            }

            // Pass the products to the view
            return view('customer.home', compact('products'));
        }
    }
    public function show($id) {
        $product = Product::with(['laptop', 'component', 'accessories'])->findOrFail($id);

        if ($product->type === 'laptop') {
            $detail = $product->laptop;
        } elseif ($product->type === 'component') {
            $detail = $product->component;
        } elseif ($product->type === 'accessories') {
            $detail = $product->accessories;
        } else {
            $detail = null;
        }

        return view('customer.product_detail', compact('product', 'detail'));
    }

}
