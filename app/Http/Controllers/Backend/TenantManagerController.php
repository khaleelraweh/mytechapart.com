<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Http\Request;

class TenantManagerController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index()
    {
        $tenants = Tenant::with('domains', 'subscriptions')->paginate(10);
        return view('backend.tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('backend.tenants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:50|unique:tenants,slug',
            'email' => 'required|email|max:255|unique:tenants,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'admin_name' => 'required|string|max:255',
        ]);

        try {
            $this->tenantService->register($validated);
            return redirect()->route('backend.tenants.index')->with('success', 'Hotel registered successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Registration failed: ' . $e->getMessage());
        }
    }

    public function edit(Tenant $tenant)
    {
        $admin_name = '';
        $tenant->run(function () use (&$admin_name) {
            $admin = \App\Models\User::role('admin')->first() ?? \App\Models\User::first();
            if ($admin) {
                $admin_name = $admin->name;
            }
        });

        return view('backend.tenants.edit', compact('tenant', 'admin_name'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:50|unique:tenants,slug,' . $tenant->id,
            'email' => 'required|email|max:255|unique:tenants,email,' . $tenant->id,
            'phone' => 'nullable|string|max:20',
            'admin_name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $tenant->update([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ]);

            // Update Domain (always use APP_URL host, not request host)
            $centralHost = parse_url(config('app.url'), PHP_URL_HOST);
            $newDomain = $validated['slug'] . '.' . $centralHost;
            
            // Assuming the tenant has one primary domain based on the slug
            $tenant->domains()->update(['domain' => $newDomain]);

            $tenant->run(function () use ($validated) {
                $admin = \App\Models\User::role('admin')->first() ?? \App\Models\User::first();
                if ($admin) {
                    $admin->name = $validated['admin_name'];
                    $admin->email = $validated['email'];
                    
                    if (!empty($validated['password'])) {
                        $admin->password = \Illuminate\Support\Facades\Hash::make($validated['password']);
                    }
                    $admin->save();
                }
            });

            return redirect()->route('backend.tenants.index')->with('success', 'Hotel details and admin user updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Update failed: ' . $e->getMessage());
        }
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('backend.tenants.index')->with('success', 'Hotel deleted successfully');
    }
}
