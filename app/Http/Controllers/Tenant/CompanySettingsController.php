<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanySettingsController extends Controller
{
    /**
     * Show the company settings page (edit form with two tabs).
     */
    public function edit()
    {
        // Get the first (and usually only) property for this tenant
        $property = Property::first();
        return view('tenant.company.settings', compact('property'));
    }

    /**
     * Update Tab 1 – Facility Info (Basic Info, Location, Contact).
     */
    public function update(Request $request)
    {
        $property = Property::firstOrNew([]);

        $request->validate([
            'name.ar'         => 'required|string|max:255',
            'name.en'         => 'nullable|string|max:255',
            'username'        => 'nullable|string|max:100',
            'type'            => 'required|string',
            'max_units'       => 'nullable|integer|min:1',
            'account_edition' => 'nullable|string|max:100',
            'tax_authority_id_type' => 'nullable|string|max:100',
            'tax_authority_id'      => 'nullable|string|max:100',
            'country'         => 'required|string|max:100',
            'region'          => 'required|string|max:100',
            'city.ar'         => 'required|string|max:100',
            'city.en'         => 'nullable|string|max:100',
            'district'        => 'required|string|max:100',
            'street'          => 'required|string|max:255',
            'timezone'        => 'required|string|max:100',
            'latitude'        => 'nullable|numeric',
            'longitude'       => 'nullable|numeric',
            'address.ar'      => 'required|string',
            'address.en'      => 'nullable|string',
            'building_number' => 'required|string|max:20',
            'sub_number'      => 'nullable|string|max:20',
            'po_box'          => 'nullable|string|max:20',
            'postal_code'     => 'required|string|max:20',
            'short_address'   => 'nullable|string|max:255',
            'phone'           => 'required|string|max:30',
            'mobile'          => 'required|string|max:30',
            'fax'             => 'nullable|string|max:30',
            'hotline'         => 'nullable|string|max:30',
            'email'           => 'required|email|max:255',
            'website'         => 'nullable|url|max:255',
            'manager_mobile'  => 'nullable|string|max:30',
            'logo'            => 'nullable|image|mimes:jpg,jpeg,png|max:750',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($property->logo) {
                Storage::disk('public')->delete($property->logo);
            }
            $property->logo = $request->file('logo')->store('property_logos', 'public');
        }

        $property->fill([
            'name'                 => $request->input('name'),          // JSON (translatable)
            'username'             => $request->input('username'),
            'type'                 => $request->input('type'),
            'max_units'            => $request->input('max_units'),
            'account_edition'      => $request->input('account_edition'),
            'tax_authority_id_type'=> $request->input('tax_authority_id_type'),
            'tax_authority_id'     => $request->input('tax_authority_id'),
            'country'              => $request->input('country'),
            'region'               => $request->input('region'),
            'city'                 => $request->input('city'),          // JSON (translatable)
            'district'             => $request->input('district'),
            'street'               => $request->input('street'),
            'timezone'             => $request->input('timezone'),
            'latitude'             => $request->input('latitude'),
            'longitude'            => $request->input('longitude'),
            'address'              => $request->input('address'),       // JSON (translatable)
            'building_number'      => $request->input('building_number'),
            'sub_number'           => $request->input('sub_number'),
            'po_box'               => $request->input('po_box'),
            'postal_code'          => $request->input('postal_code'),
            'short_address'        => $request->input('short_address'),
            'phone'                => $request->input('phone'),
            'mobile'               => $request->input('mobile'),
            'fax'                  => $request->input('fax'),
            'hotline'              => $request->input('hotline'),
            'email'                => $request->input('email'),
            'website'              => $request->input('website'),
            'manager_mobile'       => $request->input('manager_mobile'),
        ]);

        $property->save();

        return redirect()->route('company.settings')->with('success_tab1', __('tenant.settings_saved'));
    }

    /**
     * Update Tab 2 – Tourism & Business Data.
     */
    public function updateBusinessData(Request $request)
    {
        $property = Property::firstOrNew([]);

        $request->validate([
            'tourism_activity_type'  => 'nullable|string|max:100',
            'tourism_license_no'     => 'nullable|string|max:100',
            'tourism_license_expiry' => 'nullable|date',
            'rooms_count'            => 'nullable|integer|min:0',
            'beds_count'             => 'nullable|integer|min:0',
            'commercial_register_no' => 'required|string|max:100',
            'business_license_no'    => 'nullable|string|max:100',
            'vat_registration_no'    => 'required|string|max:100',
            'distance_from_haram'    => 'nullable|numeric|min:0',
            'property_description.ar'=> 'required|string',
            'property_description.en'=> 'nullable|string',
            'tourism_license_file'   => 'nullable|file|mimes:pdf,tiff|max:10240',
            'commercial_register_file'=> 'nullable|file|mimes:pdf,tiff|max:10240',
        ]);

        // Handle tourism license file
        if ($request->hasFile('tourism_license_file')) {
            if ($property->tourism_license_file) {
                Storage::disk('public')->delete($property->tourism_license_file);
            }
            $property->tourism_license_file = $request->file('tourism_license_file')->store('property_docs', 'public');
        }

        // Handle commercial register file
        if ($request->hasFile('commercial_register_file')) {
            if ($property->commercial_register_file) {
                Storage::disk('public')->delete($property->commercial_register_file);
            }
            $property->commercial_register_file = $request->file('commercial_register_file')->store('property_docs', 'public');
        }

        $property->fill([
            'tourism_activity_type'  => $request->input('tourism_activity_type'),
            'tourism_license_no'     => $request->input('tourism_license_no'),
            'tourism_license_expiry' => $request->input('tourism_license_expiry'),
            'rooms_count'            => $request->input('rooms_count'),
            'beds_count'             => $request->input('beds_count'),
            'commercial_register_no' => $request->input('commercial_register_no'),
            'business_license_no'    => $request->input('business_license_no'),
            'vat_registration_no'    => $request->input('vat_registration_no'),
            'distance_from_haram'    => $request->input('distance_from_haram'),
            'property_description'   => $request->input('property_description'), // JSON (translatable)
        ]);

        $property->save();

        return redirect()->route('company.settings')->with('success_tab2', __('tenant.settings_saved'));
    }
}
