<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('frontend.index');
    // return view('auth.login');
});

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('/admin/index', function () {
    return view('backend.index');
    // return view('auth.login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
