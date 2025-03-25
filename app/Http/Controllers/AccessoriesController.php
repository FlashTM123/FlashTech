<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Http\Requests\StoreAccessoriesRequest;
use App\Http\Requests\UpdateAccessoriesRequest;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Component;
use Illuminate\Http\Request;

class AccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Accessories::query();

        if ($request->has('brands') && !empty($request->brand)) {
            $query->whereHas('brands', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }

        $accessories = $query->paginate(5);
        $brands = Brand::where('category', 'Accessories')->get();

        return view('accessories.index', ['accessories' => $accessories, 'brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('category', 'Accessories')->get();
        $colors = Color::all();
        return view('accessories.create', compact('brands', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccessoriesRequest $request)
    {
        $accessories = Accessories::create([
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'color_id'=>$request->color_id,
            'type'=>$request->type,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'promotional_price'=> $request->promotional_price,
            'quantity'=>$request->quantity,
            'image'=>$request->image,
        ]);

        return redirect()->route('accessories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Accessories $accessories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accessories $accessories)
    {
        $brands = Brand::where('category', 'Accessories')->get();
        $colors = Color::all();

        return view('accessories.edit', compact('accessories', 'brands', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccessoriesRequest $request, Accessories $accessories)
    {
        $accessories->update([
            'name'=>$request->name,
            'brand_id'=>$request->brand_id,
            'color_id'=>$request->color_id,
            'type'=>$request->type,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'promotional_price'=> $request->promotional_price,
            'quantity'=>$request->quantity,
            'image'=>$request->image,

        ]);
        return redirect()->route('accessories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessories $accessories)
    {
        $accessories->delete();

        return view('accessories.index');
    }
}
