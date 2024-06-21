<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Redirect the root URL to the login page
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// Show the registration page
Route::get('/register', function () {
    return view('register');
})->name('register')->middleware('guest');

// Authentication routes (login, register, etc.)
Auth::routes(['register' => false]);

// Protected routes that require the user to be logged in
Route::middleware('auth')->group(function () {
    // Home page
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Product routes
    Route::get('/getProductList', [HomeController::class, 'GetProductsList'])->name('get_product_list');
    Route::post('/register_product', [HomeController::class, 'RegisterProduct'])->name('register_product');
    Route::get('/product/{id}', [HomeController::class, 'GetProductDetails'])->name('product_details');
    Route::get('/delete/{id}', [HomeController::class, 'DeleteProduct'])->name('delete_product');
    Route::put('/update/{id}', [HomeController::class, 'UpdateProduct'])->name('update_product');
});
