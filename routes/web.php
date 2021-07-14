<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::view('/', 'home', ['tab_name' => 'Home'])->name('home');

Route::view('/artikel', 'artikel', ['tab_name' => 'Artikel'])->name('artikel');
Route::view('/artikel/asalusul', 'asalusul', ['tab_name' => 'Asal Usul Forex'])->name('asalusul');
Route::view('/artikel/price_action', 'price_action', ['tab_name' => 'Price Action'])->name('price_action');
Route::view('/artikel/SnR', 'snr', ['tab_name' => 'Support and Resistance'])->name('snr');
Route::view('/artikel/mm', 'mm', ['tab_name' => 'Support and Resistance'])->name('mm');
Route::view('/artikel/bbmarsi', 'bbmarsi', ['tab_name' => 'Support and Resistance'])->name('bbmarsi');

Route::view('/berita', 'berita', ['tab_name' => 'Berita'])->name('berita');
Route::view('/contact', 'contact', ['tab_name' => 'Contact'])->name('contact');
Route::view('/register', 'register', ['tab_name' => 'Register'])->name('register');

Route::view('/login', 'login', ['tab_name' => 'Login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

// Register Route
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Logout Route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
