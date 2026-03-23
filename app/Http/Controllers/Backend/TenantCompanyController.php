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
        $companies = collect();
        $tenant->run(function () use (&$companies) {
            $companies = \App\Models\Company::all();
        });

        return view('backend.tenants.companies.create', compact('tenant', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'property_type' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'nazeel_account_expiry' => 'nullable|date',
            'facility_code' => 'nullable|string|max:100',
            'max_units' => 'required|integer|min:1',
            'account_type' => 'required|string|max:100',
            
            // ZATCA
            'tax_authority_id_type' => 'nullable|string|max:100',
            'tax_authority_id' => 'nullable|string|max:100',
            
            // Location
            'country' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'street' => 'nullable|string|max:255',
            'timezone' => 'required|string|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'address' => 'required|string',
            'building_number' => 'required|string|max:50',
            'sub_number' => 'nullable|string|max:50',
            'po_box' => 'nullable|string|max:50',
            'postal_code' => 'required|string|max:20',
            'short_address' => 'nullable|string|max:255',
            
            // Contact
            'phone' => 'required|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'hotline' => 'nullable|string|max:50',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'manager_name' => 'nullable|string|max:255',
            
            // Tourism & Commercial
            'tourism_activity_type' => 'nullable|string|max:100',
            'tourism_license_no' => 'nullable|string|max:100',
            'tourism_license_expiry' => 'nullable|date',
            'rooms_count' => 'nullable|integer|min:0',
            'beds_count' => 'nullable|integer|min:0',
            'commercial_register_no' => 'required|string|max:100',
            'business_license_no' => 'nullable|string|max:100',
            'vat_registration_no' => 'required|string|max:100',
            'distance_from_haram' => 'nullable|numeric',
            'property_description' => 'nullable|string',
            
            // Files
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tourism_license_file' => 'nullable|file|mimes:pdf,tiff,jpg,png|max:10240',
            'commercial_register_file' => 'nullable|file|mimes:pdf,tiff,jpg,png|max:10240',
            
            'parent_company_id' => 'nullable|exists:companies,id',
        ]);

        $tenant->run(function () use (&$validated, $request) {
            if ($request->hasFile('logo')) {
                $validated['logo'] = $request->file('logo')->store('company_files', 'public');
            }
            if ($request->hasFile('tourism_license_file')) {
                $validated['tourism_license_file'] = $request->file('tourism_license_file')->store('company_files', 'public');
            }
            if ($request->hasFile('commercial_register_file')) {
                $validated['commercial_register_file'] = $request->file('commercial_register_file')->store('company_files', 'public');
            }

            \App\Models\Company::create($validated);
        });

        return redirect()->route('backend.tenants.companies.index', $tenant)->with('success', 'تم إضافة الشركة/المنشأة بنجاح');
    }

    public function edit(Tenant $tenant, $company_id)
    {
        $company = null;
        $companies = collect();
        $tenant->run(function () use ($company_id, &$company, &$companies) {
            $company = \App\Models\Company::findOrFail($company_id);
            $companies = \App\Models\Company::where('id', '!=', $company_id)->get(); // List for parent company
        });

        return view('backend.tenants.companies.edit', compact('tenant', 'company', 'companies'));
    }

    public function update(Request $request, Tenant $tenant, $company_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'property_type' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'nazeel_account_expiry' => 'nullable|date',
            'facility_code' => 'nullable|string|max:100',
            'max_units' => 'required|integer|min:1',
            'account_type' => 'required|string|max:100',
            
            // ZATCA
            'tax_authority_id_type' => 'nullable|string|max:100',
            'tax_authority_id' => 'nullable|string|max:100',
            
            // Location
            'country' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'street' => 'nullable|string|max:255',
            'timezone' => 'required|string|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'address' => 'required|string',
            'building_number' => 'required|string|max:50',
            'sub_number' => 'nullable|string|max:50',
            'po_box' => 'nullable|string|max:50',
            'postal_code' => 'required|string|max:20',
            'short_address' => 'nullable|string|max:255',
            
            // Contact
            'phone' => 'required|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'hotline' => 'nullable|string|max:50',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'manager_name' => 'nullable|string|max:255',
            
            // Tourism & Commercial
            'tourism_activity_type' => 'nullable|string|max:100',
            'tourism_license_no' => 'nullable|string|max:100',
            'tourism_license_expiry' => 'nullable|date',
            'rooms_count' => 'nullable|integer|min:0',
            'beds_count' => 'nullable|integer|min:0',
            'commercial_register_no' => 'required|string|max:100',
            'business_license_no' => 'nullable|string|max:100',
            'vat_registration_no' => 'required|string|max:100',
            'distance_from_haram' => 'nullable|numeric',
            'property_description' => 'nullable|string',
            
            // Files
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tourism_license_file' => 'nullable|file|mimes:pdf,tiff,jpg,png|max:10240',
            'commercial_register_file' => 'nullable|file|mimes:pdf,tiff,jpg,png|max:10240',
            
            'parent_company_id' => 'nullable|exists:companies,id',
        ]);

        $tenant->run(function () use ($company_id, &$validated, $request) {
            $company = \App\Models\Company::findOrFail($company_id);

            if ($request->hasFile('logo')) {
                if ($company->logo) \Illuminate\Support\Facades\Storage::disk('public')->delete($company->logo);
                $validated['logo'] = $request->file('logo')->store('company_files', 'public');
            }
            if ($request->hasFile('tourism_license_file')) {
                if ($company->tourism_license_file) \Illuminate\Support\Facades\Storage::disk('public')->delete($company->tourism_license_file);
                $validated['tourism_license_file'] = $request->file('tourism_license_file')->store('company_files', 'public');
            }
            if ($request->hasFile('commercial_register_file')) {
                if ($company->commercial_register_file) \Illuminate\Support\Facades\Storage::disk('public')->delete($company->commercial_register_file);
                $validated['commercial_register_file'] = $request->file('commercial_register_file')->store('company_files', 'public');
            }

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
