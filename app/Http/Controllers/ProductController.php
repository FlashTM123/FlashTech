<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\Component;
use App\Models\Laptop;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['laptop', 'component', 'accessories']);

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_type' => 'required|in:laptop,component,accessories',
            'product_id' => 'required|integer',
            'description' => 'required|string|max:5000',
        ]);

        $product = new Product();
        $product->description = $validated['description'];

        if ($validated['product_type'] === 'laptop') {
            $product->laptop_id = $validated['product_id'];
        } elseif ($validated['product_type'] === 'component') {
            $product->component_id = $validated['product_id'];
        } elseif ($validated['product_type'] === 'accessories') {
            $product->accessories_id = $validated['product_id'];
        }

        $product->save();
        flash()->options(['position' => 'bottom-center'])->success('Sản phẩm đã được thêm thành công!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['laptop', 'component', 'accessories'])->findOrFail($id);

        $detail = $product->laptop ?? $product->component ?? $product->accessories;

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
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Cập nhật thông tin chung
        $product->description = $request->input('description');

        // Xử lý loại sản phẩm
        if ($request->input('product_type') === 'laptop') {
            $product->laptop()->updateOrCreate([], [
                'id' => $request->input('laptop_id'),
            ]);
            $product->component()->delete();
            $product->accessories()->delete();
        } elseif ($request->input('product_type') === 'component') {
            $product->component()->updateOrCreate([], [
                'id' => $request->input('component_id'),
            ]);
            $product->laptop()->delete();
            $product->accessories()->delete();
        } elseif ($request->input('product_type') === 'accessories') {
            $product->accessories()->updateOrCreate([], [
                'id' => $request->input('accessories_id'),
            ]);
            $product->laptop()->delete();
            $product->component()->delete();
        }

        $product->save();
        flash()->options(['position' => 'bottom-center'])->success('Sản phẩm đã được cập nhật thành công!');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Xóa bản ghi liên quan dựa trên loại sản phẩm
        if ($product->laptop_id) {
            Laptop::where('id', $product->laptop_id)->delete();
        } elseif ($product->component_id) {
            Component::where('id', $product->component_id)->delete();
        } elseif ($product->accessories_id) {
            Accessories::where('id', $product->accessories_id)->delete();
        }

        // Xóa sản phẩm
        $product->delete();

        flash()->options(['position' => 'bottom-center'])->success('Sản phẩm đã được xóa thành công!');
        return redirect()->route('product.index');
    }

    /**
     * Get the table name for the given type.
     */
}
