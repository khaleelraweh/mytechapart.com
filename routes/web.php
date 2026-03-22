<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\TenantManagerController;
use App\Http\Middleware\PreventAccessFromTenantDomains;
use App\Http\Controllers\Central\TenantRegistrationController;

// Frontend
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/index', [FrontendController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Language Switch (accessible from all panels)
Route::get('/lang/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])
    ->name('lang.switch')
    ->where('locale', 'en|ar');

// Backend Admin Routes
Route::middleware(['auth', PreventAccessFromTenantDomains::class])->prefix('admin')->name('backend.')->group(function () {
    Route::get('/index', [BackendController::class, 'index'])->name('index');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('tenants', TenantManagerController::class);
});

Route::middleware([PreventAccessFromTenantDomains::class])->group(function() {
    Route::get('/admin/login', [BackendController::class, 'login'])->name('backend.login');
    Route::get('/admin/forgot-password', [BackendController::class, 'forgot_password'])->name('backend.forgot_password');
});

Auth::routes();

Route::middleware([PreventAccessFromTenantDomains::class])->group(function() {
    Route::get('/register-company', [TenantRegistrationController::class, 'showRegistrationForm'])->name('central.register');
    Route::post('/register-company', [TenantRegistrationController::class, 'register'])->name('central.register.submit');
});
