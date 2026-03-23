<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies.
     */
    public function index()
    {
        $companies = Company::all();
        return view('tenant.company.index', compact('companies'));
    }

    /**
     * Display the specified company.
     */
    public function show(Company $company)
    {
        return view('tenant.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(Company $company)
    {
        return view('tenant.company.edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'phone'          => 'nullable|string|max:30',
            'manager_name'   => 'nullable|string|max:255',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Hand logo upload
        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
            $company->logo = $request->file('logo')->store('company_logos', 'public');
        }

        // Only update the allowed fields
        $company->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'manager_name' => $request->manager_name,
            // logo is handled above
        ]);

        return redirect()->route('companies.index')->with('success', __('tenant.settings_saved'));
    }
}
