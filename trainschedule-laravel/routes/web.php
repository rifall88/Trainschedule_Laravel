<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketController;

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

Route::resource('tikets', TiketController::class);
Route::get('/tikets/cetak', function () {
    return view('tiket.schedule-cetak'); // Path view: resources/views/tiket/schedule-cetak.blade.php
})->name('tikets.cetak');