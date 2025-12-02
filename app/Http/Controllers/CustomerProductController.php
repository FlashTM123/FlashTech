<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function index(Request $request)
    {
        // Lấy danh sách thương hiệu
        $brands = Brand::all();

        // Lấy từ khóa tìm kiếm và lọc theo thương hiệu
        $query = $request->input('query');
        $brandId = $request->input('brand_id');

        // Tìm kiếm sản phẩm
        $products = Product::with(['laptop', 'component', 'accessories', 'brand'])
            ->when($query, function ($q) use ($query) {
                $q->whereHas('laptop', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })->orWhereHas('component', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })->orWhereHas('accessories', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
            })
            ->when($brandId, function ($q) use ($brandId) {
                $q->where('brand_id', $brandId);
            })
            ->get();

        // Truyền dữ liệu vào view
        return view('customer.home', compact('products', 'brands'));
    }

    public function show($id)
    {
        // Lấy sản phẩm từ MongoDB với eager loading
        $product = Product::with(['laptop', 'component', 'accessories'])->findOrFail($id);

        // Lấy thông tin chi tiết từ relationship
        $detail = $product->laptop ?? $product->component ?? $product->accessories;

        // Truyền dữ liệu vào view
        return view('customer.product_detail', compact('product', 'detail'));
    }
}
