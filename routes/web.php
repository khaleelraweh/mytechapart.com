<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('frontend.index');
//     // return view('auth.login');
// });

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/admin/index', [BackendController::class, 'index'])->name('backend.index');
Route::get('/admin/login', [BackendController::class, 'login'])->name('backend.login');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
