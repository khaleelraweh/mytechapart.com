<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application locale and redirect back.
     */
    public function switch(Request $request, string $locale)
    {
        if (!in_array($locale, ['en', 'ar'])) {
            abort(400, 'Unsupported locale.');
        }

        Session::put('locale', $locale);

        return redirect()->back();
    }
}
