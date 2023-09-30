<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
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

//customers
Route::get('create_customer',[CustomerController::class,'create'])->name('create.customer');
Route::post('store_customer',[CustomerController::class,'store'])->name('store.customer');

//products
Route::get('create_product',[ProductController::class,'create'])->name('create.product');
Route::post('store_product',[productController::class,'store'])->name('store.product');
//invoices
Route::get('invoices',[InvoiceController::class,'index'])->name('invoices');

Route::get('create_invoice',[InvoiceController::class,'create'])->name('create.invoice');
Route::post('store_invoice',[invoiceController::class,'store'])->name('store.invoice');
Route::get('get_price/{id}',[InvoiceController::class,'getUnitPrice'])->name('get_price');

;
