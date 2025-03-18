<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\Brand;
use App\Http\Requests\StoreComponentRequest;
use App\Http\Requests\UpdateComponentRequest;
use Illuminate\Http\Request;
class ComponentController extends Controller
{

    public function index(Request $request)
    {
        $query = Component::query();

        if ($request->has('brand') && !empty($request->brand)) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }
        $components = $query->paginate(4);

        $brands = Brand::where('category', 'Component')->get();
       return view ('component.index', ['components' => $components, 'brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('category', 'Component')->get();
        return view('component.create', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComponentRequest $request)
    {
        $components = Component::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'type' => $request->type,
            'capacity' => $request->capacity,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'promotional_price'=> $request->promotional_price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);

        return redirect()->route('component.index')->with('add_success','The component has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Component $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Component $component)
    {
        $brands = Brand::where('category', 'Component')->get();
        return view('component.edit', ['component' => $component, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComponentRequest $request, Component $component)
    {
        $component->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'type' => $request->type,
            'capacity' => $request->capacity,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'promotional_price'=> $request->promotional_price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);
        return redirect ()->route('component.index')->with("edit_success","The component has been updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Component $component)
    {
        $component->delete();
        return redirect()->route('component.index')->with("delete_success","The component has been deleted successfully!");
    }
}
