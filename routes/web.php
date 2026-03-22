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



// Frontend
foreach (config('tenancy.central_domains', []) as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
        Route::get('/index', [FrontendController::class, 'index']);
    });
}



// Fallback for cases where domain matching might not be perfect (optional but safer)
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index.global');
Route::get('/index', [FrontendController::class, 'index']);


Route::get('/pricing-page', [FrontendController::class, 'pricing'])->name('frontend.pricing');
Route::get('/payment-page', [FrontendController::class, 'payment'])->name('frontend.payment');
Route::get('/checkout-page', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::get('/help-center-landing', [FrontendController::class, 'helpCenter'])->name('frontend.help_center');
Route::get('/help-center-article', [FrontendController::class, 'helpCenterArticle'])->name('frontend.help_center_article');
Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Language Switch (accessible from all panels)
Route::get('/lang/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])
    ->name('lang.switch')
    ->where('locale', 'en|ar');

// Backend Admin Routes
Route::middleware(['auth', PreventAccessFromTenantDomains::class])->prefix('admin')->name('backend.')->group(function () {
    Route::get('/index', [BackendController::class, 'index'])->name('index');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.post')->withoutMiddleware('auth');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::resource('tenants', TenantManagerController::class);
});

Route::middleware([PreventAccessFromTenantDomains::class])->group(function() {
    Route::get('/admin/login', [BackendController::class, 'login'])->name('backend.login');
    Route::get('/admin/forgot-password', [BackendController::class, 'forgot_password'])->name('backend.forgot_password');
});


Route::middleware([PreventAccessFromTenantDomains::class])->group(function() {

    Route::get('/register-company', [TenantRegistrationController::class, 'showRegistrationForm'])->name('central.register');
    Route::post('/register-company', [TenantRegistrationController::class, 'register'])->name('central.register.submit');
});
// Add Auth::routes() to the bottom
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout.get');
Auth::routes();
