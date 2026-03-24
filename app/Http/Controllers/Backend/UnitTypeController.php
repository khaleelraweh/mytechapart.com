<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UnitType;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
{
    public function index()
    {
        $types = UnitType::all();
        return view('backend.unit_types.index', compact('types'));
    }

    public function create()
    {
        return view('backend.unit_types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        UnitType::create($validated);
        return redirect()->route('backend.unit-types.index')->with('success', 'تم إضافة نوع الوحدة بنجاح.');
    }

    public function edit(UnitType $unitType)
    {
        return view('backend.unit_types.edit', compact('unitType'));
    }

    public function update(Request $request, UnitType $unitType)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $unitType->update($validated);
        return redirect()->route('backend.unit-types.index')->with('success', 'تم تعديل نوع الوحدة بنجاح.');
    }

    public function destroy(UnitType $unitType)
    {
        $unitType->delete();
        return redirect()->route('backend.unit-types.index')->with('success', 'تم الحذف بنجاح.');
    }
}
