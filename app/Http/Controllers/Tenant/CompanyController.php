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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255',
            'property_type' => 'required|string|max:255',
            
            // ZATCA (allowing tenant to provide their own tax ID)
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
        ]);

        if ($request->hasFile('logo')) {
            if ($company->logo) Storage::disk('public')->delete($company->logo);
            $validated['logo'] = $request->file('logo')->store('company_files', 'public');
        }
        if ($request->hasFile('tourism_license_file')) {
            if ($company->tourism_license_file) Storage::disk('public')->delete($company->tourism_license_file);
            $validated['tourism_license_file'] = $request->file('tourism_license_file')->store('company_files', 'public');
        }
        if ($request->hasFile('commercial_register_file')) {
            if ($company->commercial_register_file) Storage::disk('public')->delete($company->commercial_register_file);
            $validated['commercial_register_file'] = $request->file('commercial_register_file')->store('company_files', 'public');
        }

        $company->update($validated);

        return redirect()->route('companies.index')->with('success', __('tenant.company_updated'));
    }

    /**
     * Change the active company context and store in session.
     */
    public function changeActiveCompany(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id'
        ]);

        session(['active_company_id' => $request->company_id]);

        return redirect()->back()->with('success', 'تم تغيير المنشأة النشطة بنجاح.');
    }
}
