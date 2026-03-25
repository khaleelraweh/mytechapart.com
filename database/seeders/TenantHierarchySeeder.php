<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\Company;
use App\Models\Property;
use App\Models\Floor;
use App\Models\Unit;

class TenantHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = Tenant::all();

        foreach ($tenants as $tenant) {
            $this->command->info("Seeding building and units for Tenant: {$tenant->name}");
            
            $tenant->run(function () {
                $company = Company::first();

                if (!$company) {
                    return;
                }

                // Create a property (Building) for the company
                $property = Property::create([
                    'company_id' => $company->id,
                    'name' => [
                        'en' => 'Main Building - ' . $company->name,
                        'ar' => 'المبنى الرئيسي - ' . $company->name
                    ],
                    'city' => ['en' => 'Riyadh', 'ar' => 'الرياض'],
                    'address' => ['en' => 'King Fahd Road, Business District', 'ar' => 'طريق الملك فهد، حي الأعمال'],
                    'type' => 'hotel',
                    'total_floors' => 5,
                ]);

                // Create 5 Floors
                for ($floornum = 1; $floornum <= 5; $floornum++) {
                    $floor = Floor::create([
                        'property_id' => $property->id,
                        'floor_number' => (string) $floornum,
                    ]);

                    // Create 10 Units per floor
                    for ($unitNum = 1; $unitNum <= 10; $unitNum++) {
                        $type = $unitNum <= 2 ? 'suite' : ($unitNum <= 5 ? 'double' : 'single');
                        $price = $type === 'suite' ? 500 : ($type === 'double' ? 300 : 200);
                        $capacity = $type === 'suite' ? 4 : ($type === 'double' ? 2 : 1);
                        $beds = $type === 'suite' ? 2 : ($type === 'double' ? 2 : 1);

                        Unit::create([
                            'property_id' => $property->id,
                            'floor_id' => $floor->id,
                            'unit_number' => (string) ($floornum * 100 + $unitNum),
                            'type' => $type,
                            'price' => $price,
                            'status' => 'available',
                            'capacity' => $capacity,
                            'beds' => $beds,
                        ]);
                    }
                }
            });
            
            $this->command->info("Completed seeding for Tenant: {$tenant->name}");
        }
    }
}
