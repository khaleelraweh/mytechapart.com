<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Tenant;

echo "CENTRAL USERS:\n";
foreach(User::all() as $u) {
    echo "Resetting: " . $u->email . "\n";
    $u->password = Hash::make('12345678');
    $u->save();
}

$tenants = Tenant::all();
foreach ($tenants as $tenant) {
    echo "\nTENANT " . $tenant->id . " USERS:\n";
    tenancy()->initialize($tenant);
    foreach(User::all() as $u) {
        echo "Resetting: " . $u->email . "\n";
        $u->password = Hash::make('password123');
        $u->save();
    }
    tenancy()->end();
}
