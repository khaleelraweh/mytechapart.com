<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;

echo "Verifying Hash match for Central User 1 with '12345678': ";
$u = User::first();
echo Hash::check('12345678', $u->password) ? "TRUE\n" : "FALSE (Was double hashed!)\n";

echo "Applying fix to Central Users:\n";
foreach(User::all() as $user) {
    $user->password = '12345678';
    $user->save();
}

$tenants = Tenant::all();
foreach ($tenants as $t) {
    tenancy()->initialize($t);
    echo "Applying fix to Tenant " . $t->id . ":\n";
    foreach(User::all() as $user) {
        $user->password = 'password123';
        $user->save();
    }
    tenancy()->end();
}
echo "ALL PASSWORDS FIXED.\n";
