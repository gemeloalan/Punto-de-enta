<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSaleController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

/* Creating a route to the home page. */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products/pdf', [App\Http\Controllers\ProductController::class, 'pdf'])->name('products.pdf');
Route::get('/customers/pdf', [App\Http\Controllers\CustomerController::class, 'pdf'])->name('customers.pdf');
Route::get('/product-sale/pdf', [App\Http\Controllers\ProductSaleController::class, 'pdf'])->name('product-sales.pdf');

/* Creating the following routes: */
Route::resource('municipalities', MunicipalityController::class)->middleware('auth');
Route::resource('states', StateController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('brands', BrandController::class)->middleware('auth');
Route::resource('customers', CustomerController::class)->middleware('auth');
Route::resource('sales', SaleController::class)->middleware('auth');
Route::resource('product-sale', ProductSaleController::class)->middleware('auth');

/* Podemos crear una ruta resource y obtener los metodos que tenemos en ese determinado controlador*/
/* Route::resource('customers', CustomerController::class)
->only(['index', 'show', 'edit']); */