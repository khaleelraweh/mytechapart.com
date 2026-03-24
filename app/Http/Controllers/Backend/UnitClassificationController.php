<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UnitClassification;
use Illuminate\Http\Request;

class UnitClassificationController extends Controller
{
    public function index()
    {
        $classifications = UnitClassification::all();
        return view('backend.unit_classifications.index', compact('classifications'));
    }

    public function create()
    {
        return view('backend.unit_classifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        UnitClassification::create($validated);
        return redirect()->route('backend.unit-classifications.index')->with('success', 'تم إضافة التصنيف بنجاح.');
    }

    public function edit(UnitClassification $unitClassification)
    {
        return view('backend.unit_classifications.edit', compact('unitClassification'));
    }

    public function update(Request $request, UnitClassification $unitClassification)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'is_active' => 'boolean'
        ]);

        $validated['is_active'] = $request->has('is_active');

        $unitClassification->update($validated);
        return redirect()->route('backend.unit-classifications.index')->with('success', 'تم التعديل بنجاح.');
    }

    public function destroy(UnitClassification $unitClassification)
    {
        $unitClassification->delete();
        return redirect()->route('backend.unit-classifications.index')->with('success', 'تم الحذف بنجاح.');
    }
}
