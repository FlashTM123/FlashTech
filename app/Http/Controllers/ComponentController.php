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

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhereHas('brand', function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->search . '%');
                });
        }

       return view ('component.index', ['components' => $components]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
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
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);

        return redirect()->route('component.index');
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
        $brand = Brand::all();
        return view('component.edit', ['component' => $component, 'brands' => $brand]);
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
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);
        return redirect ()->route('component.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Component $component)
    {
        $component->delete();
        return redirect()->route('component.index');
    }
}
