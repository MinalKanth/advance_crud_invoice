<?php

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

// Route::get('/', function () {
//     return view('invoices');
// });

// View Invoice
Route::get('/', [App\Http\Controllers\InvoiceController::class, 'index'])->name('/');
// Store invoice
Route::post('invoices_store', [App\Http\Controllers\InvoiceController::class, 'store']);
// Edit invoice
Route::get('/invoices/{id}/edit', [App\Http\Controllers\InvoiceController::class, 'edit'])->name('invoice.edit');

// Delete invoice
Route::delete('/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'delete'])->name('invoice.delete');

// Delete product
Route::delete('/products/{id}', [App\Http\Controllers\InvoiceController::class, 'destroy_product']);

// Update invoice
Route::put('/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'update'])->name('invoice.update');




