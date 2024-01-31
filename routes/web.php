<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\AhligiziController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\PDFController;

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
        Route::get('/ahligizi/home', [AhligiziController::class, 'ahligiziHome'])->name('ahligizi.home');
        Route::get('/screening/create', [ScreeningController::class, 'create'])->name('screening.create');
        Route::post('/screening/store', [ScreeningController::class, 'store'])->name('storeScreening');
        // Route::get('/screening/{id}', [AhligiziController::class, 'showSc'])->name('showScreening');
        // Route::get('/screening/{id}', [AhligiziController::class, 'dataScreening'])->name('ahligizi.screening');
        // Route::get('/screening', [AhligiziController::class, 'dataScreening'])->name('ahligizi.screening');
        Route::get('/{id}/edit', [ScreeningController::class, 'edit'])->name('screening.edit');
        Route::put('/{id}/update', [ScreeningController::class, 'update'])->name('updateScreening');
        Route::get('/{id}/delete', [ScreeningController::class, 'destroy'])->name('screening.delete');
        
        Route::get('/ahligizi/tables', [AhliGiziController::class, 'ahligiziTables'])->name('ahligizi.tables');
        Route::get('/pasien', [AhligiziController::class, 'pasienData'])->name('pasien.index');
        Route::get('/pasien/{id}', [AhligiziController::class, 'detailPasien'])->name('pasien.detail');
        Route::get('/ahligizi/search-pasien', [AhligiziController::class, 'searchPasien'])->name('pasien.search');
        Route::get('/ahligizi/search-screening', [ScreeningController::class, 'searchScreening'])->name('screening.search');
        Route::get('/pasien/screening/{id}', [AhligiziController::class, 'dataScreening'])->name('pasien.screening');

        Route::get('/pdf/screening/{id}', [ScreeningController::class, 'generatePDF']);

    });

    Route::middleware('user-access:kitchen')->group(function () {
        Route::get('/kitchen/home', [KitchenController::class, 'kitchenHome'])->name('kitchen.home');
        Route::get('/kitchen/tables', [KitchenController::class, 'kitchenTables'])->name('kitchen.tables');
        Route::get('/kitchen/menumakan', [KitchenController::class, 'pasienData'])->name('kitchen.menumakan');
        Route::get('/menumakan/{id}', [KitchenController::class, 'detailPasien'])->name('kitchen.detail');
        Route::post('/menumakan/{id}', [KitchenController::class, 'updateMakanan'])->name('kitchen.detail');
        Route::get('/kitchen/search', [KitchenController::class, 'searchPasien'])->name('kitchen.search');
        Route::get('/kitchen/print', [KitchenController::class, 'printPasien'])->name('kitchen.print');
        Route::get('/printPasien/{id}', [KitchenController::class, 'printPasien'])->name('kitchen.print');
        Route::get('/kitchen/addMakanan', [KitchenController::class, 'addMakanan'])->name('kitchen.addMakanan');
        Route::post('/kitchen/addMakanan', [KitchenController::class, 'storeMakanan'])->name('kitchen.addMakanan');

    });

    Route::middleware('user-access:distributor')->group(function () {
        Route::get('/distributor/home', [DistributorController::class, 'distributorHome'])->name('distributor.home');
        Route::get('/distributor/tables', [DistributorController::class, 'distributorTables'])->name('distributor.tables');
        Route::get('/pengantaran', [DistributorController::class, 'pasienData'])->name('pengantaran.index');
        Route::get('/pengantaran/{id}', [DistributorController::class, 'detailPasien'])->name('pengantaran.detail');
        // Route::get('/distributor/screening', [DistributorController::class, 'dataScreening'])->name('distributor.screening');
        // Route::get('/distributor/screening/{id_screening}', [DistributorController::class, 'detailScreening'])->name('distributor.screeningDetail');
        Route::get('/distributor/makananselesai', [DistributorController::class, 'makananSelesai'])->name('distributor.makananSelesai');
        Route::get('/distributor/makananproses', [DistributorController::class, 'makananProses'])->name('distributor.makananProses');
        Route::get('/makananproses/{id}', [DistributorController::class, 'detailMakananProses'])->name('distributor.makananProsesDetail');
        Route::post('/makananproses/{id}', [DistributorController::class, 'updateMakananProses'])->name('distributor.makananProsesDetail');
        Route::get('/makananselesai/{id}', [DistributorController::class, 'detailMakananSelesai'])->name('distributor.makanSelesaiDetail');
        Route::post('/makananselesai/{id}', [DistributorController::class, 'updateMakananSelesai'])->name('distributor.makanSelesaiDetail');

    });

    Route::get('profile', function () {
		return view('profile');
	})->name('profile');
    Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/screening/{id}', [ScreeningController::class, 'detailScreening'])->name('screening.detail');
    Route::get('/screening', [ScreeningController::class, 'screeningData'])->name('screening.index');
    Route::get('/pdf/screening/{id}', [ScreeningController::class, 'generatePDF']);
    // Route::get('/screening/{id}', [ScreeningController::class, 'detailScreening'])->name('screening.detail');
});