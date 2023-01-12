<?php

use App\Http\Controllers\cvsController;
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
    return view('index');
})->name('home');

Route::get('cvs', [cvsController::class, 'index'])->name('cvs.index');

Route::get('cvs/{id}', [cvsController::class, 'show'])->name('cvs.show');

Route::get('cvs/{id}/pdf', [cvsController::class, 'pdf'])->name('cvs.pdf');

Route::get('contact', function () {
    return view('contact');
})->name('contact');
