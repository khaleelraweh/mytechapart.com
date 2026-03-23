<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\Floor;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $floor_id = $request->query('floor_id');
        if (!$floor_id) {
            return redirect()->route('properties.index')->with('error', 'Please select a hotel and its floor first.');
        }
        $floor = Floor::with('property')
            ->whereHas('property', function($q) {
                $q->where('company_id', session('active_company_id'));
            })->findOrFail($floor_id);
            
        $units = $floor->units()->orderBy('unit_number')->get();
        
        return view('tenant.units.index', compact('floor', 'units'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'floor_id' => 'required|exists:floors,id',
            'unit_number' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'beds' => 'required|integer|min:1',
            'status' => 'required|string|in:available,booked,maintenance'
        ]);

        $floor = Floor::findOrFail($validated['floor_id']);
        $validated['property_id'] = $floor->property_id;

        Unit::create($validated);
        return back()->with('success', 'Room added successfully.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return back()->with('success', 'Room deleted successfully.');
    }
}
