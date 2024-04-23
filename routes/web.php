<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CustomerController;

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
//     return view('welcome');
// });

// Route::get('index', function () {
//     return view('index');
// });


Route::get('/', [FrontPageController::class, 'index'])->name('index');


// Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product');
// Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
// Route::post('admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
// Route::get('admin/product/show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
// Route::get('admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
// Route::put('admin/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
// Route::delete('admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

// Route::get('admin/customer', [CustomerController::class, 'index'])->name('admin.customer');
// Route::get('admin/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
// Route::post('admin/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
// Route::get('admin/customer/show/{id}', [CustomerController::class, 'show'])->name('admin.customer.show');
// Route::get('admin/customer/edit/{id}',[CustomerController::class,'edit'])->name('admin.customer.edit');
// Route::put('admin/customer/update/{id}',[CustomerController::class,'update'])->name('admin.customer.update');
// Route::delete('admin/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product', ProductController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('customer', CustomerController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('category', CategoryController::class);
});
