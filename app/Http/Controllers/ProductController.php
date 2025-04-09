<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\Component;
use App\Models\Laptop;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Product::query();



        $products = $query->paginate(5);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $request->validate([

            'type' => 'required|in:laptop,component,accessories',
            'type_id' => 'required|integer|exists:' . $this->getTableName($request->type) . ',id',
            'description' => 'required|string|max:5000',
        ]);

        // Tạo bản ghi trong bảng products
        $product = Product::create([
            'type' => $request->type,
            'type_id' => $request->type_id,
            'description' => $request->description,
        ]);

        // Cập nhật product_id trong bảng tương ứng
        if ($request->type === 'laptop') {
            Laptop::where('id', $request->type_id)->update(['product_id' => $product->id]);
        } elseif ($request->type === 'component') {
            Component::where('id', $request->type_id)->update(['product_id' => $product->id]);
        } elseif ($request->type === 'accessories') {
            Accessories::where('id', $request->type_id)->update(['product_id' => $product->id]);
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }


    /**
     * Get the table name for the given type.
     */
    private function getTableName($type)
    {
        $tableNames = [
            'laptop' => 'laptops',
            'component' => 'components',
            'accessories' => 'accessories',
        ];

        return $tableNames[$type] ?? $type;
    }

    /**
     * Display the specified resource.
     */
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

        return view('product.show', compact('product', 'detail'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'type_id' => $request->type_id,
            'description' => $request->description,
        ]);
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
