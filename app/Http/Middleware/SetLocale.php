<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     * Reads locale from session (set by LanguageController) and applies it.
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = Session::get('locale', config('app.locale', 'ar'));


        // Only allow supported locales
        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'ar';

        }

        App::setLocale($locale);

        return $next($request);
    }
}
