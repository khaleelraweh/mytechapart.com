<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use App\Services\TenantService;
use Illuminate\Http\Request;

class TenantRegistrationController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function showRegistrationForm()
    {
        return view('central.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:50|unique:tenants,slug',
            'email' => 'required|email|max:255|unique:tenants,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'admin_name' => 'required|string|max:255',
            // Company Fields
            'company_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'nazeel_account_expiry' => 'nullable|date',
            'facility_code' => 'nullable|string|max:255',
            'max_units' => 'required|integer|min:1',
            'account_type' => 'required|string|max:255',
            'address' => 'required|string',
            'building_number' => 'nullable|string|max:255',
            'sub_number' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
        ]);

        try {
            $tenant = $this->tenantService->register($validated);
            
            $domain = $tenant->domains->first()->domain;
            $scheme = request()->getScheme();
            $port = request()->getPort() == 80 || request()->getPort() == 443 ? '' : ':' . request()->getPort();
            return redirect()->away("{$scheme}://{$domain}{$port}/")->with('success', 'Tenant and Company registered successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }
}
