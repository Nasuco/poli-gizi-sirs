<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    // Route::middleware('user-access:superadmin')->group(function () {
    //     Route::get('/home', [HomeController::class, 'index'])->name('home');
    // });

    Route::middleware('user-access:ahligizi')->group(function () {
        Route::get('/ahligizi/home', [HomeController::class, 'ahligiziHome'])->name('ahligizi.home');
    });

    Route::middleware('user-access:pramusaji')->group(function () {
        Route::get('/pramusaji/home', [HomeController::class, 'pramusajiHome'])->name('pramusaji.home');
    });

    Route::middleware('user-access:distributor')->group(function () {
        Route::get('/distributor/home', [HomeController::class, 'distributorHome'])->name('distributor.home');
    });

    Route::get('profile', function () {
		return view('profile');
	})->name('profile');
    Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
});