<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Property;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index(Request $request)
    {
        $property_id = $request->query('property_id');
        if (!$property_id) {
            return redirect()->route('properties.index')->with('error', 'Please select a hotel first to manage its floors.');
        }
        $property = Property::where('company_id', session('active_company_id'))->findOrFail($property_id);
        $floors = $property->floors()->withCount('units')->orderBy('floor_number')->get();
        
        return view('tenant.floors.index', compact('property', 'floors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'floor_number' => 'required|integer'
        ]);

        Floor::create($validated);
        return back()->with('success', 'Floor added successfully.');
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();
        return back()->with('success', 'Floor deleted successfully.');
    }
}
