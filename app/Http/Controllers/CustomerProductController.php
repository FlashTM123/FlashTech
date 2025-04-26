<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ request
        $query = $request->input('query');

        // Tìm kiếm sản phẩm dựa trên từ khóa
        if ($query) {
            $products = Product::whereHas('laptop', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })->orWhereHas('component', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })->orWhereHas('accessories', function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })->get();
        } else {
            // Nếu không có từ khóa, lấy tất cả sản phẩm
            $products = Product::with(['laptop', 'component', 'accessories'])->get();
        }

        // Truyền danh sách sản phẩm vào view
        return view('customer.home', compact('products'));
    }

    public function show($id)
    {
        // Lấy sản phẩm và thông tin chi tiết từ bảng liên quan
        $product = Product::with(['laptop', 'component', 'accessories'])->findOrFail($id);

        // Lấy thông tin chi tiết dựa trên loại sản phẩm
        $detail = $product->laptop ?? $product->component ?? $product->accessories;

        // Truyền dữ liệu vào view
        return view('customer.product_detail', compact('product', 'detail'));
    }
}
