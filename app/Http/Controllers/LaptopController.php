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

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhereHas('brand', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%');
                });
        }

        $laptops = $query->get();
        return view('laptop.index', ['laptops' => $laptops]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();
        return view('laptop.create',['brands' => $brands], ['colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLaptopRequest $request)
    {
        $laptops = Laptop::create([
            'name' => $request->name,
            'brand_id'=> $request->brand_id,
            'color_id'=> $request->color_id,
            'cpu' => $request->cpu,  // Chữ thường
            'ram' => $request->ram,  // Chữ thường
            'vga' => $request->vga,  // Chữ thường
            'storage' => $request->storage,
            'price'=> $request->price,
            'quantity'=>$request->quantity,
            'image'=>$request->image,
        ]);

//        dd($request->all());

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
        $brands = Brand::all();
        $colors = Color::all();

        return view('laptop.edit', ['laptop' => $laptop, 'brands' => $brands], ['colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLaptopRequest $request, Laptop $laptop)
    {
        $laptop->update([
            'name' => $request->name,
            'brand_id'=> $request->brand_id,
            'color_id'=> $request->color_id,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'vga' => $request->vga,
            'storage' => $request->storage,
            'price'=> $request->price,
            'quantity'=>$request->quantity,
            'image'=>$request->image,
        ]);
        return redirect()->route('laptop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptop $laptop)
    {
        $laptop->delete();
        return redirect()->route('laptop.index');
    }
}
