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

Route::get('/', function () {
//     return view('welcome');
    return view('auth.login');
});


Route::get('/register', function () {
//     return view('welcome');
    return view('register')->name('register');
});

Route::get('/dashboard', function () {
//     return view('welcome');
    return view('dashboard');
});




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/getProductList', [HomeController::class, 'GetProductsList']);
Route::post('/register_product', [HomeController::class, 'RegisterProduct'])->name('register_product');
Route::get('/product/{id}', [HomeController::class, 'GetProductDetails']);
Route::get('/delete/{id}', [HomeController::class, 'DeleteProduct']);
Route::post('/update/{id}', [HomeController::class, 'UpdateProduct']);
