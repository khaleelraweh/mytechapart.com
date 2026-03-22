<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\TenantService;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenantService = app(TenantService::class);

        $hotels = [
            [
                'name' => 'Grand Plaza Hotel',
                'slug' => 'grandhotel',
                'email' => 'admin@grandhotel.localhost',
                'phone' => '0501234567',
                'password' => 'password',
                'admin_name' => 'Grand Admin',
            ],
            [
                'name' => 'Blue Resort',
                'slug' => 'blueresort',
                'email' => 'admin@blueresort.localhost',
                'phone' => '0507654321',
                'password' => 'password',
                'admin_name' => 'Blue Admin',
            ]
        ];

        foreach ($hotels as $hotelData) {
            try {
                if (!Tenant::where('slug', $hotelData['slug'])->exists()) {
                    $tenantService->register($hotelData);
                    $this->command->info("Tenant '{$hotelData['name']}' created successfully.");
                } else {
                    $this->command->warn("Tenant '{$hotelData['name']}' already exists.");
                }
            } catch (\Exception $e) {
                $this->command->error("Failed to create tenant '{$hotelData['name']}': " . $e->getMessage());
            }
        }
    }
}
