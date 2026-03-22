<?php

namespace App\Services;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class TenantService
{
    public function register(array $data)
    {
        // return DB::transaction(function () use ($data) {
            // 1. Create Tenant
            $tenant = Tenant::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
            ]);

            // 2. Assign Domain dynamically based on APP_URL (not request host)
            // This ensures consistency whether created from browser (127.0.0.1) or CLI seeder
            $centralHost = parse_url(config('app.url'), PHP_URL_HOST);
            $domain = $data['slug'] . '.' . $centralHost;
            $tenant->domains()->create(['domain' => $domain]);

            // 3. Create Subscription (Free Default Plan if none selected)
            if (isset($data['plan_id'])) {
                $tenant->subscriptions()->create([
                    'plan_id' => $data['plan_id'],
                    'start_date' => now(),
                    'end_date' => now()->addDays(30),
                    'status' => 'active'
                ]);
            }

            // 4. Create Admin User within Tenant Context
            $tenant->run(function () use ($data) {
                $admin = User::create([
                    'name' => $data['admin_name'] ?? 'Admin',
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);

                // Ensure 'admin' role exists in the tenant database
                $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
                $admin->assignRole($role);
            });

            return $tenant;
        // });
    }
}
