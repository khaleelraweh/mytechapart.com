<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function pricing()
    {
        return view('frontend.pricing-page');
    }

    public function payment()
    {
        return view('frontend.payment-page');
    }

    public function checkout()
    {
        return view('frontend.checkout-page');
    }

    public function helpCenter()
    {
        return view('frontend.help-center-landing');
    }

    public function helpCenterArticle()
    {
        return view('frontend.help-center-article');
    }
}
