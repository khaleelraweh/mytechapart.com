<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::withCount('floors')->get();
        return view('tenant.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('tenant.properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string|in:hotel,apartment,resort',
            'total_floors' => 'required|integer|min:1'
        ]);

        $property = Property::create($validated);
        
        // Auto-generate floors according to Total Floors specified
        for ($i = 1; $i <= $validated['total_floors']; $i++) {
            $property->floors()->create(['floor_number' => $i]);
        }

        return redirect()->route('properties.index')->with('success', 'Property successfully created and floors auto-generated.');
    }

    public function edit(Property $property)
    {
        return view('tenant.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string',
            'type' => 'required|string|in:hotel,apartment,resort',
        ]);
        
        // Exclude total_floors from update manually since floors already exist
        $property->update($validated);
        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
