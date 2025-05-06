<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Laptop;
use App\Http\Requests\StoreLaptopRequest;
use App\Http\Requests\UpdateLaptopRequest;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Laptop::query();

        // Lọc theo brand nếu có brand được chọn
        if ($request->has('brand') && !empty($request->brand)) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }

        // Phân trang kết quả
        $laptops = $query->paginate(perPage: 5);

        // Lấy danh sách brand để hiển thị trong dropdown
        $brands = Brand::get();


        return view('laptop.index', [
            'laptops' => $laptops,
            'brands' => $brands // Truyền danh sách brand vào view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::get();

        return view('laptop.create',['brands' => $brands], );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaptopRequest $request)
    {
        $laptops = Laptop::create([
            'name' => $request->name,
            'brand_id'=> $request->brand_id,
            'color' => $request->color,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'vga' => $request->vga,
            'storage' => $request->storage,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'promotional_price'=> $request->promotional_price,
            'quantity'=>$request->quantity,
            'image'=>$request->image,
            'description' => $request->description,

        ]);

//        dd($request->all());
        flash()->options(['position' => 'bottom-center'])->success('Laptop đã được thêm thành công!');
        return redirect()->route('laptop.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laptop $laptop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laptop $laptop)
    {
        $brands = Brand::get();


        return view('laptop.edit', ['laptop' => $laptop, 'brands' => $brands], );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaptopRequest $request, Laptop $laptop)
    {
        $laptop->update([
            'name' => $request->name,
            'brand_id'=> $request->brand_id,
        'color' => $request->color,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'vga' => $request->vga,
            'storage' => $request->storage,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'promotional_price'=> $request->promotional_price,
            'quantity'=>$request->quantity,
            'image'=>$request->image,
            'description' => $request->description,
        ]);
        flash()->options(['position' => 'bottom-center'])->success('Laptop đã được cập nhật thành công!');
        return redirect()->route('laptop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        flash()->options(['position' => 'bottom-center'])->success('Laptop đã được xóa thành công!');
        return redirect()->route('laptop.index');
    }

    /**
     * Search laptops by name.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Tìm kiếm laptop theo tên
        $laptops = Laptop::with('brand')
            ->where('name', 'like', '%' . $query . '%')
            ->get();

        // Trả về kết quả dưới dạng JSON
        return response()->json($laptops);
    }
}
