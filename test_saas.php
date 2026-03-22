<?php
// c:\xampp\htdocs\mytechapart.com\test_saas.php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Services\TenantService;
use App\Models\Plan;
use Illuminate\Support\Facades\Artisan;

try {
    echo "Running central migrations...\n";
    Artisan::call('migrate:fresh', ['--force' => true]);
    echo Artisan::output();

    echo "Creating Plan...\n";
    $plan = Plan::create([
        'name' => 'Premium',
        'price' => 99.99,
        'duration_days' => 30,
        'max_units' => 0,
        'features' => ['all_features' => true]
    ]);

    echo "Registering Tenant...\n";
    $service = new TenantService();
    $tenant = $service->register([
        'name' => 'Test Hotel',
        'slug' => 'testhotel',
        'email' => 'admin@testhotel.com',
        'phone' => '123456789',
        'password' => 'password123',
        'admin_name' => 'SaaS Admin',
        'plan_id' => $plan->id,
    ]);

    echo "Tenant created: " . $tenant->id . " with domain: " . $tenant->domains->first()->domain . "\n";
    echo "Success!\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
