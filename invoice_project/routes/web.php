<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController as I;

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
    return view('welcome');
});

Route::prefix('invoices')->name('invoices-')->group(function () {
    Route::get('/', [I::class, 'index'])->name('index');
    Route::get('/create', [I::class, 'create'])->name('create');
    Route::post('/', [I::class, 'store'])->name('store');
    Route::get('/show/{invoice}', [I::class, 'show'])->name('show');
    Route::get('/edit/{invoice}', [I::class, 'edit'])->name('edit');
    Route::put('/{invoice}', [I::class, 'update'])->name('update');
    Route::get('/delete/{invoice}', [I::class, 'delete'])->name('delete');
    Route::delete('/{invoice}', [I::class, 'destroy'])->name('destroy');
});

Auth::routes(); //logino routai

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //home routas
