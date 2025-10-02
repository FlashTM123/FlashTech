<?php

namespace App\Http\Controllers;

use App\Models\Components;
use App\Models\Brand;
use App\Http\Requests\StoreComponentRequest;
use App\Http\Requests\UpdateComponentRequest;
use Illuminate\Http\Request;
class ComponentController extends Controller
{

    public function index(Request $request)
    {
        $query = Components::query();

        if ($request->has('brand') && !empty($request->brand)) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }
        $components = $query->paginate(10);

        $brands = Brand::get();
       return view ('Admins.component.index', ['components' => $components, 'brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::get();
        return view('Admins.component.create', ['brands' => $brands]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComponentRequest $request)
    {
        $components = Components::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'type' => $request->type,
            'capacity' => $request->capacity,
            'original_price' => $request->original_price,
            'discount' => $request->discount,
            'promotional_price'=> $request->promotional_price,
            'quantity' => $request->quantity,
            'image' => $request->image,
            'description' => $request->description,
        ]);
        flash()->option('position', 'bottom-center')
            ->option('icon', 'success')
            ->success('The component has been added successfully!');

        return redirect()->route('Admins.component.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Components $component)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Components $component)
    {
        $brands = Brand::get();
        return view('Admins.component.edit', ['component' => $component, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComponentRequest $request, Components $component)
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
            'description' => $request->description,
        ]);

        flash()->option('position', 'bottom-center')
            ->option('icon', 'success')
            ->success('The component has been updated successfully!');
        return redirect ()->route('component.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Components $component)
    {
        $component->delete();
        return redirect()->route('Admins.component.index')->with("delete_success","The component has been deleted successfully!");
    }
}
