<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Tenant\PropertyController;
use App\Http\Controllers\Tenant\FloorController;
use App\Http\Controllers\Tenant\UnitController;
use App\Http\Controllers\Tenant\ReservationController;
use App\Http\Controllers\Tenant\CustomerController;
use App\Http\Controllers\Tenant\PaymentController;

use App\Http\Controllers\Tenant\TenantDashboardController;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    // Auth routes (login/logout) — must be accessible without authentication
    Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);





    // All other routes require the user to be logged in
    Route::middleware('auth')->group(function() {
        Route::get('/', [TenantDashboardController::class, 'index'])->name('tenant.dashboard');
        Route::get('/dashboard', [TenantDashboardController::class, 'index']);
        
        Route::resource('properties', PropertyController::class);



        Route::resource('floors', FloorController::class);
        Route::resource('units', UnitController::class);
        Route::resource('reservations', ReservationController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('payments', PaymentController::class);
    });
});
