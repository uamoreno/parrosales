<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerAddrController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\AjaxAdddressController;

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


Route::resource('/customer',CustomerController::class);
Route::resource('/customer/{customer}/customeraddr',CustomerAddrController::class);
Route::resource('/product',ProductController::class);
Route::resource('/order',OrderController::class);
Route::resource('/order/{order}/orderdetail',OrderDetailController::class);

Route::get('/ajaxAddress/{customer_id}', AjaxAdddressController::class);
