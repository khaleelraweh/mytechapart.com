<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Company;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Only execute if not in artisan console and tenancy is initialized
            if (!app()->runningInConsole() && function_exists('tenancy') && tenancy()->initialized) {
                // We only need to share this specifically where it's used, but sharing globally for tenant views is fine.
                // We check if the current view name contains 'tenant' or 'partials.tenant'
                if (str_starts_with($view->getName(), 'tenant') || str_starts_with($view->getName(), 'partials.tenant') || str_starts_with($view->getName(), 'layouts.tenant')) {
                    
                    $tenantCompanies = Company::all();
                    $activeCompanyId = session('active_company_id');
                    $activeCompany = null;
                    
                    if ($activeCompanyId) {
                        $activeCompany = $tenantCompanies->firstWhere('id', $activeCompanyId);
                    }
                    
                    // Default to the first company if none selected
                    if (!$activeCompany && $tenantCompanies->count() > 0) {
                        $activeCompany = $tenantCompanies->first();
                        session(['active_company_id' => $activeCompany->id]);
                    }
                    
                    $view->with(compact('tenantCompanies', 'activeCompany'));
                }
            }
        });
    }
}
