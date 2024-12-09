<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\donorsController;
use App\Http\Controllers\transactionsController;
use App\Http\Controllers\donationsController;
use App\Http\Controllers\bankController;
use App\Http\Controllers\programsController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});



Route::get('/donasi/form', function () {
    return view('donasi.form');
})->name('donasi.form');

// admin



Route::get('/hubul', [adminController::class, 'index']);

Route::prefix('hubul')->group(function () {
    // Donors Routes
    Route::get('donors', [DonorsController::class, 'index'])->name('admin.donors.index');
    Route::get('donors/create', [DonorsController::class, 'create'])->name('admin.donors.create');
    Route::post('donors', [DonorsController::class, 'store'])->name('admin.donors.store');
    Route::get('donors/{id}/edit', [DonorsController::class, 'edit'])->name('admin.donors.edit');
    Route::put('donors/{id}', [DonorsController::class, 'update'])->name('admin.donors.update');
    Route::delete('donors/{id}', [DonorsController::class, 'destroy'])->name('admin.donors.destroy');
    Route::get('donors/{id}', [DonorsController::class, 'show'])->name('admin.donors.show');
});

//donations
Route::get('/donations', [donationsController::class, 'index']); 

//bank
Route::get('/bank', [bankController::class, 'index']);

//programs
Route::get('/programs', [programsController::class, 'index']);

//transactions
Route::get('/transactions', [transactionsController::class, 'index']);