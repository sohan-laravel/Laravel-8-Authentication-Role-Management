<?php

use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Admin routes

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('roles', RolesController::class, [
        'as' => 'admin'
    ]);
    Route::resource('users', UsersController::class, [
        'as' => 'admin'
    ]);

    // login routes

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('admin.login.submit');

    // logout routes

    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('admin.logout.submit');

    // Forget Password routes

    Route::get('/password/reset', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset/submit', [ForgetPasswordController::class, 'reset'])->name('admin.password.update');
});
