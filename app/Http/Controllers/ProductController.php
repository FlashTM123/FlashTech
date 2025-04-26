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
        $products = Product::with(['laptop', 'component', 'accessories'])->paginate(5);

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
            $product->accessory_id = $validated['product_id'];
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
    public function update(UpdateProductRequest $request, Product $product)
    {
        $request->validate([
            'type' => 'required|in:laptop,component,accessories',
            'type_id' => 'required|integer|exists:' . $this->getTableName($request->type) . ',id',
            'description' => 'required|string|max:5000',
        ]);

        $product->description = $request->description;

        if ($request->type === 'laptop') {
            $product->laptop_id = $request->type_id;
            $product->component_id = null;
            $product->accessories_id = null;
        } elseif ($request->type === 'component') {
            $product->component_id = $request->type_id;
            $product->laptop_id = null;
            $product->accessory_id = null;
        } elseif ($request->type === 'accessories') {
            $product->accessories_id = $request->type_id;
            $product->laptop_id = null;
            $product->component_id = null;
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
        $product->delete();
        flash()->options(['position' => 'bottom-center'])->success('Sản phẩm đã được xóa thành công!');
        return redirect()->route('product.index');
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
}
