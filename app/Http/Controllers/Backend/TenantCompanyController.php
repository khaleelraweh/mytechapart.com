<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tenant $tenant)
    {
        $companies = collect();
        $tenant->run(function () use (&$companies) {
            $companies = \App\Models\Company::all();
        });

        return view('backend.tenants.companies.index', compact('tenant', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Tenant $tenant)
    {
        return view('backend.tenants.companies.create', compact('tenant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'nazeel_account_expiry' => 'nullable|date',
            'facility_code' => 'nullable|string|max:100',
            'max_units' => 'required|integer|min:1',
            'account_type' => 'required|string|max:100',
            'address' => 'required|string',
            'building_number' => 'nullable|string|max:50',
            'sub_number' => 'nullable|string|max:50',
            'postal_code' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $tenant->run(function () use ($validated) {
            \App\Models\Company::create($validated);
        });

        return redirect()->route('backend.tenants.companies.index', $tenant)->with('success', 'تم إضافة الشركة/المنشأة بنجاح بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant, $company_id)
    {
        $company = null;
        $tenant->run(function () use ($company_id, &$company) {
            $company = \App\Models\Company::findOrFail($company_id);
        });

        return view('backend.tenants.companies.edit', compact('tenant', 'company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant, $company_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'nazeel_account_expiry' => 'nullable|date',
            'facility_code' => 'nullable|string|max:100',
            'max_units' => 'required|integer|min:1',
            'account_type' => 'required|string|max:100',
            'address' => 'required|string',
            'building_number' => 'nullable|string|max:50',
            'sub_number' => 'nullable|string|max:50',
            'postal_code' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $tenant->run(function () use ($company_id, $validated) {
            $company = \App\Models\Company::findOrFail($company_id);
            $company->update($validated);
        });

        return redirect()->route('backend.tenants.companies.index', $tenant)->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant, $company_id)
    {
        $tenant->run(function () use ($company_id) {
            $company = \App\Models\Company::findOrFail($company_id);
            $company->delete();
        });

        return redirect()->route('backend.tenants.companies.index', $tenant)->with('success', 'تم الحذف بنجاح');
    }
}
