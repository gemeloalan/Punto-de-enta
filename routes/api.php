<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiCategoryController;
use App\Http\Controllers\apiBrandController;
use App\Http\Controllers\apiStateController;
use App\Http\Controllers\apiMunicipalityController;
use App\Http\Controllers\apiProductController;
use App\Http\Controllers\apiCustomerController;
use App\Http\Controllers\apiSaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();   
});
route::apiResource('categories', apiCategoryController::class);
route::apiResource('brands', apiBrandController::class);
route::apiResource('states', apiStateController::class);
route::apiResource('municipalities', apiMunicipalityController::class);
route::apiResource('products', apiProductController::class);
route::apiResource('customers', apiCustomerController::class);
route::apiResource('sales', apiSaleController::class);
/* route::apiResource('customers', apiCategoryController::class);
 */