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

use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\UserController;

Route::middleware(['auth'])->prefix('admin')->name('backend.')->group(function () {
    Route::get('/index', [BackendController::class, 'index'])->name('index');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
});

// Remove these individual lines since we grouped them above
// Route::get('/admin/index', [BackendController::class, 'index'])->name('backend.index');
Route::get('/admin/login', [BackendController::class, 'login'])->name('backend.login');
Route::get('/admin/forgot-password', [BackendController::class, 'forgot_password'])->name('backend.forgot_password');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
